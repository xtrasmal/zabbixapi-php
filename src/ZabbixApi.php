<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix;

use GuzzleHttp\ClientInterface;
use IntelliTrend\Zabbix\Clients\Credentials;
use IntelliTrend\Zabbix\Clients\HttpClient;
use IntelliTrend\Zabbix\Clients\JsonRpcClient;
use IntelliTrend\Zabbix\Requests\ApiinfoVersionRequest;
use IntelliTrend\Zabbix\Requests\UserLoginRequest;
use IntelliTrend\Zabbix\Requests\ZabbixRequest;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class ZabbixApi
{
    public const VERSION = '3.3.0';
    public const EXCEPTION_CLASS_CODE = 1000;
    public const EXCEPTION_CLASS_CODE_AUTH = 2000;
    public const DEFAULT_TIMEOUT = 30;
    public const DEFAULT_CONNECTION_TIMEOUT = 10;

    private const JSON_RPC_REQUEST_ID = 1;
    /** @var list<string> */
    private const UNAUTHENTICATED_METHODS = ['apiinfo.version', 'user.login'];

    private ?Credentials $credentials = null;
    private ?string $apiVersion = null;

    private JsonRpcClient $jsonRpcClient;
    private LoggerInterface $logger;

    /**
     * @param array<string, mixed> $options Guzzle request options.
     */
    public function __construct(
        array $options = [],
        ?ClientInterface $httpClient = null,
        ?LoggerInterface $logger = null,
    ) {
        $this->jsonRpcClient = new JsonRpcClient(new HttpClient($httpClient, $options), $logger);
        $this->logger = $logger ?? new NullLogger();
    }

    /**
     * Configure this client once for bearer-token API calls.
     *
     * @throws ZabbixApiException
     */
    public function connect(string $zabUrl, ?string $zabToken = null): self
    {
        $this->credentials = Credentials::fromEndpoint($zabUrl, $zabToken);
        $this->logConfiguration();
        $this->apiVersion = $this->getApiVersion();

        return $this;
    }

    public function setLogger(LoggerInterface $logger): self
    {
        $this->logger = $logger;
        $this->jsonRpcClient->setLogger($logger);

        return $this;
    }

    /**
     * @throws ZabbixApiException
     */
    public function getApiVersion(): string
    {
        $this->apiVersion ??= (string)$this->request(ApiinfoVersionRequest::fromParams([]));

        return $this->apiVersion;
    }

    public function getVersion(): string
    {
        return self::VERSION;
    }

    /**
     * @throws ZabbixApiException
     */
    public function getAuthToken(): string
    {
        return $this->requireBearerToken();
    }

    /**
     * @throws ZabbixApiException
     */
    public function call(string $method, array $params = []): array|bool|float|int|string|null
    {
        $response = $this->send($method, $params);

        if ($response->error !== null) {
            throw self::zabbixError($response->error);
        }

        return $response->result;
    }

    /**
     * @throws ZabbixApiException
     */
    public function request(ZabbixRequest $request): array|bool|float|int|string|null
    {
        if ($request instanceof UserLoginRequest) {
            return $this->loginWhenNeeded($request);
        }

        return $this->call($request->method(), $request->params());
    }

    private function logConfiguration(): void
    {
        $this->logger->debug('Configured Zabbix HTTP client.', [
            'endpoint' => $this->requireCredentials()->endpoint(),
            'library_version' => self::VERSION,
        ]);
    }

    private function send(string $method, array $params = []): \IntelliTrend\Zabbix\JsonRpc\Response
    {
        return $this->jsonRpcClient->call(
            url: $this->endpoint(),
            method: $method,
            id: self::JSON_RPC_REQUEST_ID,
            params: $params,
            bearerToken: $this->bearerTokenFor($method)
        );
    }

    private function bearerTokenFor(string $method): ?string
    {
        return in_array($method, self::UNAUTHENTICATED_METHODS, true) ? null : $this->requireBearerToken();
    }

    private function endpoint(): string
    {
        return $this->requireCredentials()->endpoint();
    }

    private function requireCredentials(): Credentials
    {
        if ($this->credentials === null) {
            throw new ZabbixApiException('Not connected to a Zabbix API endpoint', self::EXCEPTION_CLASS_CODE_AUTH);
        }

        return $this->credentials;
    }

    private function requireBearerToken(): string
    {
        $bearerToken = $this->requireCredentials()->bearerToken;

        if ($bearerToken === null) {
            throw new ZabbixApiException('No Zabbix API bearer token configured', self::EXCEPTION_CLASS_CODE_AUTH);
        }

        return $bearerToken;
    }

    /**
     * @throws ZabbixApiException
     */
    private function loginWhenNeeded(UserLoginRequest $request): array|bool|float|int|string|null
    {
        $credentials = $this->requireCredentials();

        if ($credentials->bearerToken !== null) {
            return $credentials->bearerToken;
        }

        $result = $this->call($request->method(), $request->params());

        $bearerToken = is_string($result) ? $result : (is_array($result) ? ($result['sessionid'] ?? null) : null);

        if (!is_string($bearerToken) || trim($bearerToken) === '') {
            throw new ZabbixApiException('user.login did not return an authentication token.', self::EXCEPTION_CLASS_CODE_AUTH);
        }

        $this->credentials = $credentials->withBearerToken($bearerToken);

        return $result;
    }

    /**
     * @param array{code: int, message: string, data?: array|bool|float|int|string|null} $error
     */
    private static function zabbixError(array $error): ZabbixApiException
    {
        $data = $error['data'] ?? null;

        try {
            $details = is_scalar($data) || $data === null
                ? (string)$data
                : json_encode($data, JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            $details = 'unencodable error data';
        }

        return new ZabbixApiException(
            message: "{$error['message']} [$details]",
            code: $error['code']
        );
    }
}
