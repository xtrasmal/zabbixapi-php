<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix;

use GuzzleHttp\ClientInterface;
use IntelliTrend\Zabbix\Clients\Credentials;
use IntelliTrend\Zabbix\Clients\HttpClient;
use IntelliTrend\Zabbix\Clients\JsonRpcClient;
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
    private const API_VERSION_METHOD = 'apiinfo.version';

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
    public function login(string $zabUrl, string $zabToken): self
    {
        $this->credentials = Credentials::fromLogin($zabUrl, $zabToken);
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
        $this->apiVersion ??= (string)$this->call(self::API_VERSION_METHOD);

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
        return $this->requireCredentials()->bearerToken;
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
        return $method === self::API_VERSION_METHOD ? null : $this->getAuthToken();
    }

    private function endpoint(): string
    {
        return $this->requireCredentials()->endpoint();
    }

    private function requireCredentials(): Credentials
    {
        if ($this->credentials === null) {
            throw new ZabbixApiException('Not logged in and no API token', self::EXCEPTION_CLASS_CODE_AUTH);
        }

        return $this->credentials;
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
