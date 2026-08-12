<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use GuzzleHttp\ClientInterface;
use Idiot\Zabbix\Api\ZabbixApiGroup;
use Idiot\Zabbix\Api\ZabbixBatch;
use Idiot\Zabbix\Api\ZabbixRequestApi;
use Idiot\Zabbix\Clients\Credentials;
use Idiot\Zabbix\Clients\HttpClient;
use Idiot\Zabbix\Clients\JsonRpcClient;
use Idiot\Zabbix\Requests\ApiinfoVersionRequest;
use Idiot\Zabbix\Requests\UserLoginRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;
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
    private const JSON_RPC_VERSION_REQUEST_ID = 1;
    private const JSON_RPC_BATCH_REQUEST_ID = 2;

    /** @var list<string> */
    private const UNAUTHENTICATED_METHODS = ['apiinfo.version', 'user.login'];

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ActionApi> */
    public readonly ZabbixApiGroup $actions;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\AlertApi> */
    public readonly ZabbixApiGroup $alerts;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ApiInfoApi> */
    public readonly ZabbixApiGroup $apiInfo;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\AuditLogApi> */
    public readonly ZabbixApiGroup $auditLogs;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\AuthenticationApi> */
    public readonly ZabbixApiGroup $authentication;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\AutoregistrationApi> */
    public readonly ZabbixApiGroup $autoregistration;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ConnectorApi> */
    public readonly ZabbixApiGroup $connectors;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\CorrelationApi> */
    public readonly ZabbixApiGroup $correlations;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\DashboardApi> */
    public readonly ZabbixApiGroup $dashboards;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\DCheckApi> */
    public readonly ZabbixApiGroup $dchecks;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\DHostApi> */
    public readonly ZabbixApiGroup $dhosts;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\DiscoveryRuleApi> */
    public readonly ZabbixApiGroup $discoveryRules;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\DRuleApi> */
    public readonly ZabbixApiGroup $drules;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\DServiceApi> */
    public readonly ZabbixApiGroup $dservices;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\EventApi> */
    public readonly ZabbixApiGroup $events;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\GraphItemApi> */
    public readonly ZabbixApiGroup $graphItems;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\GraphPrototypeApi> */
    public readonly ZabbixApiGroup $graphPrototypes;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\GraphApi> */
    public readonly ZabbixApiGroup $graphs;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\HaNodeApi> */
    public readonly ZabbixApiGroup $haNodes;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\HistoryApi> */
    public readonly ZabbixApiGroup $history;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\HostGroupApi> */
    public readonly ZabbixApiGroup $hostGroups;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\HostInterfaceApi> */
    public readonly ZabbixApiGroup $hostInterfaces;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\HostPrototypeApi> */
    public readonly ZabbixApiGroup $hostPrototypes;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\HostApi> */
    public readonly ZabbixApiGroup $hosts;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\HousekeepingApi> */
    public readonly ZabbixApiGroup $housekeeping;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\HttpTestApi> */
    public readonly ZabbixApiGroup $httpTests;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\IconMapApi> */
    public readonly ZabbixApiGroup $iconMaps;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ImageApi> */
    public readonly ZabbixApiGroup $images;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ItemPrototypeApi> */
    public readonly ZabbixApiGroup $itemPrototypes;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ItemApi> */
    public readonly ZabbixApiGroup $items;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\MaintenanceApi> */
    public readonly ZabbixApiGroup $maintenance;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\MapApi> */
    public readonly ZabbixApiGroup $maps;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\MediaTypeApi> */
    public readonly ZabbixApiGroup $mediaTypes;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\MfaApi> */
    public readonly ZabbixApiGroup $mfa;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ModuleApi> */
    public readonly ZabbixApiGroup $modules;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ProblemApi> */
    public readonly ZabbixApiGroup $problems;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ProxyApi> */
    public readonly ZabbixApiGroup $proxies;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ProxyGroupApi> */
    public readonly ZabbixApiGroup $proxyGroups;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\RegexpApi> */
    public readonly ZabbixApiGroup $regexps;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ReportApi> */
    public readonly ZabbixApiGroup $reports;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\RoleApi> */
    public readonly ZabbixApiGroup $roles;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ScriptApi> */
    public readonly ZabbixApiGroup $scripts;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ServiceApi> */
    public readonly ZabbixApiGroup $services;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\SettingsApi> */
    public readonly ZabbixApiGroup $settings;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\SlaApi> */
    public readonly ZabbixApiGroup $slas;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\TaskApi> */
    public readonly ZabbixApiGroup $tasks;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\TemplateDashboardApi> */
    public readonly ZabbixApiGroup $templateDashboards;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\TemplateGroupApi> */
    public readonly ZabbixApiGroup $templateGroups;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\TemplateApi> */
    public readonly ZabbixApiGroup $templates;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\TokenApi> */
    public readonly ZabbixApiGroup $tokens;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\TrendApi> */
    public readonly ZabbixApiGroup $trends;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\TriggerPrototypeApi> */
    public readonly ZabbixApiGroup $triggerPrototypes;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\TriggerApi> */
    public readonly ZabbixApiGroup $triggers;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\UserDirectoryApi> */
    public readonly ZabbixApiGroup $userDirectories;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\UserGroupApi> */
    public readonly ZabbixApiGroup $userGroups;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\UserMacroApi> */
    public readonly ZabbixApiGroup $userMacros;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\UserApi> */
    public readonly ZabbixApiGroup $users;

    /** @var ZabbixApiGroup<\Idiot\Zabbix\Api\ValueMapApi> */
    public readonly ZabbixApiGroup $valueMaps;

    private ?Credentials $credentials = null;
    private ?string $apiVersion = null;
    private JsonRpcClient $jsonRpcClient;
    private LoggerInterface $logger;
    private ZabbixRequestApi $requests;
    private ?UserLoginRequest $loginRequest = null;

    /**
     * @param array<string, mixed> $options Zabbix options plus Guzzle request options.
     */
    public function __construct(
        array $options = [],
        ?ClientInterface $httpClient = null,
        ?LoggerInterface $logger = null,
    ) {
        $options = ZabbixApiOptions::fromArray($options);
        $this->jsonRpcClient = new JsonRpcClient(new HttpClient($httpClient, $options->http), $logger);
        $this->logger = $logger ?? new NullLogger();
        $this->requests = new ZabbixRequestApi();
        $this->bindApiGroups();
        $this->loginRequest = $options->login;

        if (null !== $options->url) {
            $this->configure($options->url, $options->token);
        }
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

        if (null !== $response->error) {
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

    /**
     * Queue several Zabbix API calls and send them as one JSON-RPC batch.
     *
     * @return list<array|bool|float|int|string|null>
     */
    public function batch(callable|ZabbixRequest ...$requests): array
    {
        $requests = $this->collectBatchRequests($requests);

        if ([] === $requests) {
            throw new ZabbixApiException('Cannot send an empty Zabbix API batch.', self::EXCEPTION_CLASS_CODE);
        }

        $responses = $this->sendBatch($requests);
        $results = [];

        foreach ($responses as $index => $response) {
            if (null !== $response->error) {
                throw self::zabbixError($response->error);
            }

            $result = $response->result;
            $request = $requests[$index];

            if ($request instanceof ApiinfoVersionRequest) {
                $this->apiVersion = (string)$result;
            }

            if ($request instanceof UserLoginRequest) {
                $this->storeBearerTokenFromLoginResult($result);
            }

            $results[] = $result;
        }

        return $results;
    }

    /**
     * @throws ZabbixApiException
     */
    private function configure(string $zabUrl, ?string $zabToken = null): void
    {
        $this->credentials = Credentials::fromEndpoint($zabUrl, $zabToken);
        $this->logConfiguration();
    }

    private function bindApiGroups(): void
    {
        $this->actions = $this->apiGroup($this->requests->actions);
        $this->alerts = $this->apiGroup($this->requests->alerts);
        $this->apiInfo = $this->apiGroup($this->requests->apiInfo);
        $this->auditLogs = $this->apiGroup($this->requests->auditLogs);
        $this->authentication = $this->apiGroup($this->requests->authentication);
        $this->autoregistration = $this->apiGroup($this->requests->autoregistration);
        $this->connectors = $this->apiGroup($this->requests->connectors);
        $this->correlations = $this->apiGroup($this->requests->correlations);
        $this->dashboards = $this->apiGroup($this->requests->dashboards);
        $this->dchecks = $this->apiGroup($this->requests->dchecks);
        $this->dhosts = $this->apiGroup($this->requests->dhosts);
        $this->discoveryRules = $this->apiGroup($this->requests->discoveryRules);
        $this->drules = $this->apiGroup($this->requests->drules);
        $this->dservices = $this->apiGroup($this->requests->dservices);
        $this->events = $this->apiGroup($this->requests->events);
        $this->graphItems = $this->apiGroup($this->requests->graphItems);
        $this->graphPrototypes = $this->apiGroup($this->requests->graphPrototypes);
        $this->graphs = $this->apiGroup($this->requests->graphs);
        $this->haNodes = $this->apiGroup($this->requests->haNodes);
        $this->history = $this->apiGroup($this->requests->history);
        $this->hostGroups = $this->apiGroup($this->requests->hostGroups);
        $this->hostInterfaces = $this->apiGroup($this->requests->hostInterfaces);
        $this->hostPrototypes = $this->apiGroup($this->requests->hostPrototypes);
        $this->hosts = $this->apiGroup($this->requests->hosts);
        $this->housekeeping = $this->apiGroup($this->requests->housekeeping);
        $this->httpTests = $this->apiGroup($this->requests->httpTests);
        $this->iconMaps = $this->apiGroup($this->requests->iconMaps);
        $this->images = $this->apiGroup($this->requests->images);
        $this->itemPrototypes = $this->apiGroup($this->requests->itemPrototypes);
        $this->items = $this->apiGroup($this->requests->items);
        $this->maintenance = $this->apiGroup($this->requests->maintenance);
        $this->maps = $this->apiGroup($this->requests->maps);
        $this->mediaTypes = $this->apiGroup($this->requests->mediaTypes);
        $this->mfa = $this->apiGroup($this->requests->mfa);
        $this->modules = $this->apiGroup($this->requests->modules);
        $this->problems = $this->apiGroup($this->requests->problems);
        $this->proxies = $this->apiGroup($this->requests->proxies);
        $this->proxyGroups = $this->apiGroup($this->requests->proxyGroups);
        $this->regexps = $this->apiGroup($this->requests->regexps);
        $this->reports = $this->apiGroup($this->requests->reports);
        $this->roles = $this->apiGroup($this->requests->roles);
        $this->scripts = $this->apiGroup($this->requests->scripts);
        $this->services = $this->apiGroup($this->requests->services);
        $this->settings = $this->apiGroup($this->requests->settings);
        $this->slas = $this->apiGroup($this->requests->slas);
        $this->tasks = $this->apiGroup($this->requests->tasks);
        $this->templateDashboards = $this->apiGroup($this->requests->templateDashboards);
        $this->templateGroups = $this->apiGroup($this->requests->templateGroups);
        $this->templates = $this->apiGroup($this->requests->templates);
        $this->tokens = $this->apiGroup($this->requests->tokens);
        $this->trends = $this->apiGroup($this->requests->trends);
        $this->triggerPrototypes = $this->apiGroup($this->requests->triggerPrototypes);
        $this->triggers = $this->apiGroup($this->requests->triggers);
        $this->userDirectories = $this->apiGroup($this->requests->userDirectories);
        $this->userGroups = $this->apiGroup($this->requests->userGroups);
        $this->userMacros = $this->apiGroup($this->requests->userMacros);
        $this->users = $this->apiGroup($this->requests->users);
        $this->valueMaps = $this->apiGroup($this->requests->valueMaps);
    }

    /**
     * @template TBuilder of object
     *
     * @param TBuilder $requests
     *
     * @return ZabbixApiGroup<TBuilder>
     */
    private function apiGroup(object $requests): ZabbixApiGroup
    {
        return new ZabbixApiGroup($this, $requests);
    }

    private function logConfiguration(): void
    {
        $this->logger->debug('Configured Zabbix HTTP client.', [
            'endpoint' => $this->requireCredentials()->endpoint(),
            'library_version' => self::VERSION,
        ]);
    }

    private function send(string $method, array $params = []): \Idiot\Zabbix\JsonRpc\Response
    {
        $bearerToken = $this->bearerTokenFor($method);

        if (null === $this->apiVersion && 'apiinfo.version' !== $method) {
            return $this->sendWithApiVersion($method, $params, $bearerToken);
        }

        return $this->jsonRpcClient->call(
            url: $this->endpoint(),
            method: $method,
            id: self::JSON_RPC_REQUEST_ID,
            params: $params,
            bearerToken: $bearerToken,
        );
    }

    private function sendWithApiVersion(
        string $method,
        array $params,
        ?string $bearerToken,
    ): \Idiot\Zabbix\JsonRpc\Response {
        [$versionResponse, $response] = $this->jsonRpcClient->batch(
            url: $this->endpoint(),
            calls: [
                [
                    'method' => 'apiinfo.version',
                    'id' => self::JSON_RPC_VERSION_REQUEST_ID,
                    'params' => [],
                ],
                [
                    'method' => $method,
                    'id' => self::JSON_RPC_BATCH_REQUEST_ID,
                    'params' => $params,
                ],
            ],
            bearerToken: $bearerToken,
        );

        if (null !== $versionResponse->error) {
            throw self::zabbixError($versionResponse->error);
        }

        $this->apiVersion = (string)$versionResponse->result;

        return $response;
    }

    /**
     * @param list<callable|ZabbixRequest> $requests
     *
     * @return list<ZabbixRequest>
     */
    private function collectBatchRequests(array $requests): array
    {
        if (1 === count($requests) && is_callable($requests[0]) && !$requests[0] instanceof ZabbixRequest) {
            $batch = new ZabbixBatch($this->requests);
            $requests[0]($batch);

            return $batch->queuedRequests();
        }

        foreach ($requests as $request) {
            if (!$request instanceof ZabbixRequest) {
                throw new \InvalidArgumentException('Zabbix API batches only accept request objects or one batch callback.');
            }
        }

        return array_values($requests);
    }

    /**
     * @param list<ZabbixRequest> $requests
     *
     * @return list<\Idiot\Zabbix\JsonRpc\Response>
     */
    private function sendBatch(array $requests): array
    {
        $calls = [];
        $nextId = 1;
        $includeVersion = null === $this->apiVersion && !$this->batchContainsMethod($requests, 'apiinfo.version');

        if ($includeVersion) {
            $calls[] = [
                'method' => 'apiinfo.version',
                'id' => $nextId++,
                'params' => [],
            ];
        }

        foreach ($requests as $request) {
            $calls[] = [
                'method' => $request->method(),
                'id' => $nextId++,
                'params' => $request->params(),
            ];
        }

        $responses = $this->jsonRpcClient->batch(
            url: $this->endpoint(),
            calls: $calls,
            bearerToken: $this->bearerTokenForBatch($requests),
        );

        if (!$includeVersion) {
            return $responses;
        }

        $versionResponse = array_shift($responses);
        if (null !== $versionResponse->error) {
            throw self::zabbixError($versionResponse->error);
        }

        $this->apiVersion = (string)$versionResponse->result;

        return $responses;
    }

    /** @param list<ZabbixRequest> $requests */
    private function batchContainsMethod(array $requests, string $method): bool
    {
        foreach ($requests as $request) {
            if ($request->method() === $method) {
                return true;
            }
        }

        return false;
    }

    /** @param list<ZabbixRequest> $requests */
    private function bearerTokenForBatch(array $requests): ?string
    {
        foreach ($requests as $request) {
            if (!in_array($request->method(), self::UNAUTHENTICATED_METHODS, true)) {
                return $this->requireBearerToken();
            }
        }

        return null;
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
        if (null === $this->credentials) {
            throw new ZabbixApiException('Not connected to a Zabbix API endpoint', self::EXCEPTION_CLASS_CODE_AUTH);
        }

        return $this->credentials;
    }

    private function requireBearerToken(): string
    {
        $bearerToken = $this->requireCredentials()->bearerToken;

        if (null === $bearerToken && null !== $this->loginRequest) {
            $this->loginWhenNeeded($this->loginRequest);
            $bearerToken = $this->requireCredentials()->bearerToken;
        }

        if (null === $bearerToken) {
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

        if (null !== $credentials->bearerToken) {
            return $credentials->bearerToken;
        }

        $result = $this->call($request->method(), $request->params());
        $this->storeBearerTokenFromLoginResult($result);

        return $result;
    }

    private function storeBearerTokenFromLoginResult(array|bool|float|int|string|null $result): void
    {
        $credentials = $this->requireCredentials();
        $bearerToken = is_string($result) ? $result : (is_array($result) ? ($result['sessionid'] ?? null) : null);

        if (!is_string($bearerToken) || '' === trim($bearerToken)) {
            throw new ZabbixApiException('user.login did not return an authentication token.', self::EXCEPTION_CLASS_CODE_AUTH);
        }

        $this->credentials = $credentials->withBearerToken($bearerToken);
    }

    /**
     * @param array{code: int, message: string, data?: array|bool|float|int|string|null} $error
     */
    private static function zabbixError(array $error): ZabbixApiException
    {
        $data = $error['data'] ?? null;

        try {
            $details = is_scalar($data) || null === $data
                ? (string)$data
                : json_encode($data, JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            $details = 'unencodable error data';
        }

        return new ZabbixApiException(
            message: "{$error['message']} [$details]",
            code: $error['code'],
        );
    }
}
