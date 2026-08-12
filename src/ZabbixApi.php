<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use GuzzleHttp\ClientInterface;
use Idiot\Zabbix\Api\ActionApi;
use Idiot\Zabbix\Api\AlertApi;
use Idiot\Zabbix\Api\ApiInfoApi;
use Idiot\Zabbix\Api\AuditLogApi;
use Idiot\Zabbix\Api\AuthenticationApi;
use Idiot\Zabbix\Api\AutoregistrationApi;
use Idiot\Zabbix\Api\ConnectorApi;
use Idiot\Zabbix\Api\CorrelationApi;
use Idiot\Zabbix\Api\DashboardApi;
use Idiot\Zabbix\Api\DCheckApi;
use Idiot\Zabbix\Api\DHostApi;
use Idiot\Zabbix\Api\DiscoveryRuleApi;
use Idiot\Zabbix\Api\DRuleApi;
use Idiot\Zabbix\Api\DServiceApi;
use Idiot\Zabbix\Api\EventApi;
use Idiot\Zabbix\Api\GraphApi;
use Idiot\Zabbix\Api\GraphItemApi;
use Idiot\Zabbix\Api\GraphPrototypeApi;
use Idiot\Zabbix\Api\HaNodeApi;
use Idiot\Zabbix\Api\HistoryApi;
use Idiot\Zabbix\Api\HostApi;
use Idiot\Zabbix\Api\HostGroupApi;
use Idiot\Zabbix\Api\HostInterfaceApi;
use Idiot\Zabbix\Api\HostPrototypeApi;
use Idiot\Zabbix\Api\HousekeepingApi;
use Idiot\Zabbix\Api\HttpTestApi;
use Idiot\Zabbix\Api\IconMapApi;
use Idiot\Zabbix\Api\ImageApi;
use Idiot\Zabbix\Api\ItemApi;
use Idiot\Zabbix\Api\ItemPrototypeApi;
use Idiot\Zabbix\Api\MaintenanceApi;
use Idiot\Zabbix\Api\MapApi;
use Idiot\Zabbix\Api\MediaTypeApi;
use Idiot\Zabbix\Api\MfaApi;
use Idiot\Zabbix\Api\ModuleApi;
use Idiot\Zabbix\Api\ProblemApi;
use Idiot\Zabbix\Api\ProxyApi;
use Idiot\Zabbix\Api\ProxyGroupApi;
use Idiot\Zabbix\Api\RegexpApi;
use Idiot\Zabbix\Api\ReportApi;
use Idiot\Zabbix\Api\RoleApi;
use Idiot\Zabbix\Api\ScriptApi;
use Idiot\Zabbix\Api\ServiceApi;
use Idiot\Zabbix\Api\SettingsApi;
use Idiot\Zabbix\Api\SlaApi;
use Idiot\Zabbix\Api\TaskApi;
use Idiot\Zabbix\Api\TemplateApi;
use Idiot\Zabbix\Api\TemplateDashboardApi;
use Idiot\Zabbix\Api\TemplateGroupApi;
use Idiot\Zabbix\Api\TokenApi;
use Idiot\Zabbix\Api\TrendApi;
use Idiot\Zabbix\Api\TriggerApi;
use Idiot\Zabbix\Api\TriggerPrototypeApi;
use Idiot\Zabbix\Api\UserApi;
use Idiot\Zabbix\Api\UserDirectoryApi;
use Idiot\Zabbix\Api\UserGroupApi;
use Idiot\Zabbix\Api\UserMacroApi;
use Idiot\Zabbix\Api\ValueMapApi;
use Idiot\Zabbix\Api\ZabbixApiGroup;
use Idiot\Zabbix\Api\ZabbixBatch;
use Idiot\Zabbix\Api\ZabbixRequestApi;
use Idiot\Zabbix\Clients\Credentials;
use Idiot\Zabbix\Clients\HttpClient;
use Idiot\Zabbix\Clients\JsonRpcClient;
use Idiot\Zabbix\Clients\JsonRpcResponse;
use Idiot\Zabbix\Requests\ApiinfoVersionRequest;
use Idiot\Zabbix\Requests\UserLoginRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;
use Idiot\Zabbix\Requests\ZabbixRequestValidator;
use InvalidArgumentException;
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

    /** @var ZabbixApiGroup<ActionApi> */
    public readonly ZabbixApiGroup $actions;

    /** @var ZabbixApiGroup<AlertApi> */
    public readonly ZabbixApiGroup $alerts;

    /** @var ZabbixApiGroup<ApiInfoApi> */
    public readonly ZabbixApiGroup $apiInfo;

    /** @var ZabbixApiGroup<AuditLogApi> */
    public readonly ZabbixApiGroup $auditLogs;

    /** @var ZabbixApiGroup<AuthenticationApi> */
    public readonly ZabbixApiGroup $authentication;

    /** @var ZabbixApiGroup<AutoregistrationApi> */
    public readonly ZabbixApiGroup $autoregistration;

    /** @var ZabbixApiGroup<ConnectorApi> */
    public readonly ZabbixApiGroup $connectors;

    /** @var ZabbixApiGroup<CorrelationApi> */
    public readonly ZabbixApiGroup $correlations;

    /** @var ZabbixApiGroup<DashboardApi> */
    public readonly ZabbixApiGroup $dashboards;

    /** @var ZabbixApiGroup<DCheckApi> */
    public readonly ZabbixApiGroup $dchecks;

    /** @var ZabbixApiGroup<DHostApi> */
    public readonly ZabbixApiGroup $dhosts;

    /** @var ZabbixApiGroup<DiscoveryRuleApi> */
    public readonly ZabbixApiGroup $discoveryRules;

    /** @var ZabbixApiGroup<DRuleApi> */
    public readonly ZabbixApiGroup $drules;

    /** @var ZabbixApiGroup<DServiceApi> */
    public readonly ZabbixApiGroup $dservices;

    /** @var ZabbixApiGroup<EventApi> */
    public readonly ZabbixApiGroup $events;

    /** @var ZabbixApiGroup<GraphItemApi> */
    public readonly ZabbixApiGroup $graphItems;

    /** @var ZabbixApiGroup<GraphPrototypeApi> */
    public readonly ZabbixApiGroup $graphPrototypes;

    /** @var ZabbixApiGroup<GraphApi> */
    public readonly ZabbixApiGroup $graphs;

    /** @var ZabbixApiGroup<HaNodeApi> */
    public readonly ZabbixApiGroup $haNodes;

    /** @var ZabbixApiGroup<HistoryApi> */
    public readonly ZabbixApiGroup $history;

    /** @var ZabbixApiGroup<HostGroupApi> */
    public readonly ZabbixApiGroup $hostGroups;

    /** @var ZabbixApiGroup<HostInterfaceApi> */
    public readonly ZabbixApiGroup $hostInterfaces;

    /** @var ZabbixApiGroup<HostPrototypeApi> */
    public readonly ZabbixApiGroup $hostPrototypes;

    /** @var ZabbixApiGroup<HostApi> */
    public readonly ZabbixApiGroup $hosts;

    /** @var ZabbixApiGroup<HousekeepingApi> */
    public readonly ZabbixApiGroup $housekeeping;

    /** @var ZabbixApiGroup<HttpTestApi> */
    public readonly ZabbixApiGroup $httpTests;

    /** @var ZabbixApiGroup<IconMapApi> */
    public readonly ZabbixApiGroup $iconMaps;

    /** @var ZabbixApiGroup<ImageApi> */
    public readonly ZabbixApiGroup $images;

    /** @var ZabbixApiGroup<ItemPrototypeApi> */
    public readonly ZabbixApiGroup $itemPrototypes;

    /** @var ZabbixApiGroup<ItemApi> */
    public readonly ZabbixApiGroup $items;

    /** @var ZabbixApiGroup<MaintenanceApi> */
    public readonly ZabbixApiGroup $maintenance;

    /** @var ZabbixApiGroup<MapApi> */
    public readonly ZabbixApiGroup $maps;

    /** @var ZabbixApiGroup<MediaTypeApi> */
    public readonly ZabbixApiGroup $mediaTypes;

    /** @var ZabbixApiGroup<MfaApi> */
    public readonly ZabbixApiGroup $mfa;

    /** @var ZabbixApiGroup<ModuleApi> */
    public readonly ZabbixApiGroup $modules;

    /** @var ZabbixApiGroup<ProblemApi> */
    public readonly ZabbixApiGroup $problems;

    /** @var ZabbixApiGroup<ProxyApi> */
    public readonly ZabbixApiGroup $proxies;

    /** @var ZabbixApiGroup<ProxyGroupApi> */
    public readonly ZabbixApiGroup $proxyGroups;

    /** @var ZabbixApiGroup<RegexpApi> */
    public readonly ZabbixApiGroup $regexps;

    /** @var ZabbixApiGroup<ReportApi> */
    public readonly ZabbixApiGroup $reports;

    /** @var ZabbixApiGroup<RoleApi> */
    public readonly ZabbixApiGroup $roles;

    /** @var ZabbixApiGroup<ScriptApi> */
    public readonly ZabbixApiGroup $scripts;

    /** @var ZabbixApiGroup<ServiceApi> */
    public readonly ZabbixApiGroup $services;

    /** @var ZabbixApiGroup<SettingsApi> */
    public readonly ZabbixApiGroup $settings;

    /** @var ZabbixApiGroup<SlaApi> */
    public readonly ZabbixApiGroup $slas;

    /** @var ZabbixApiGroup<TaskApi> */
    public readonly ZabbixApiGroup $tasks;

    /** @var ZabbixApiGroup<TemplateDashboardApi> */
    public readonly ZabbixApiGroup $templateDashboards;

    /** @var ZabbixApiGroup<TemplateGroupApi> */
    public readonly ZabbixApiGroup $templateGroups;

    /** @var ZabbixApiGroup<TemplateApi> */
    public readonly ZabbixApiGroup $templates;

    /** @var ZabbixApiGroup<TokenApi> */
    public readonly ZabbixApiGroup $tokens;

    /** @var ZabbixApiGroup<TrendApi> */
    public readonly ZabbixApiGroup $trends;

    /** @var ZabbixApiGroup<TriggerPrototypeApi> */
    public readonly ZabbixApiGroup $triggerPrototypes;

    /** @var ZabbixApiGroup<TriggerApi> */
    public readonly ZabbixApiGroup $triggers;

    /** @var ZabbixApiGroup<UserDirectoryApi> */
    public readonly ZabbixApiGroup $userDirectories;

    /** @var ZabbixApiGroup<UserGroupApi> */
    public readonly ZabbixApiGroup $userGroups;

    /** @var ZabbixApiGroup<UserMacroApi> */
    public readonly ZabbixApiGroup $userMacros;

    /** @var ZabbixApiGroup<UserApi> */
    public readonly ZabbixApiGroup $users;

    /** @var ZabbixApiGroup<ValueMapApi> */
    public readonly ZabbixApiGroup $valueMaps;

    private ?Credentials $credentials = null;
    private ?string $apiVersion = null;
    private JsonRpcClient $jsonRpcClient;
    private LoggerInterface $logger;
    private ZabbixRequestApi $requests;
    private ZabbixRequestValidator $requestValidator;
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
        $this->requestValidator = ZabbixRequestValidator::createDefault();
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
    public function call(string $method, array $params = []): mixed
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
    public function request(ZabbixRequest $request): mixed
    {
        $this->requestValidator->validate($request);

        if ($request instanceof UserLoginRequest) {
            return $this->loginWhenNeeded($request);
        }

        return $this->call($request->method(), $request->params());
    }

    /**
     * Queue several Zabbix API calls and send them as one JSON-RPC batch.
     *
     * @return list<mixed>
     */
    public function batch(callable|ZabbixRequest ...$requests): array
    {
        $requests = $this->collectBatchRequests($requests);

        if ([] === $requests) {
            throw new ZabbixApiException('Cannot send an empty Zabbix API batch.', self::EXCEPTION_CLASS_CODE);
        }

        foreach ($requests as $request) {
            $this->requestValidator->validate($request);
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

    private function send(string $method, array $params = []): Clients\JsonRpcResponse
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
    ): Clients\JsonRpcResponse {
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
                throw new InvalidArgumentException('Zabbix API batches only accept request objects or one batch callback.');
            }
        }

        return array_values($requests);
    }

    /**
     * @param list<ZabbixRequest> $requests
     *
     * @return list<JsonRpcResponse>
     */
    private function sendBatch(array $requests): array
    {
        $calls = [];
        $nextId = 1;
        $includeVersion = null === $this->apiVersion && !$this->batchContainsMethod($requests);

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
    private function batchContainsMethod(array $requests): bool
    {
        foreach ($requests as $request) {
            if ('apiinfo.version' === $request->method()) {
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
    private function loginWhenNeeded(UserLoginRequest $request): mixed
    {
        $credentials = $this->requireCredentials();

        if (null !== $credentials->bearerToken) {
            return $credentials->bearerToken;
        }

        $result = $this->call($request->method(), $request->params());
        $this->storeBearerTokenFromLoginResult($result);

        return $result;
    }

    private function storeBearerTokenFromLoginResult(mixed $result): void
    {
        $credentials = $this->requireCredentials();
        $bearerToken = is_string($result) ? $result : (is_array($result) ? ($result['sessionid'] ?? null) : null);

        if (!is_string($bearerToken) || '' === trim($bearerToken)) {
            throw new ZabbixApiException('user.login did not return an authentication token.', self::EXCEPTION_CLASS_CODE_AUTH);
        }

        $this->credentials = $credentials->withBearerToken($bearerToken);
    }

    /**
     * @param array{code: int, message: string, data?: mixed} $error
     */
    private static function zabbixError(array $error): ZabbixApiException
    {
        return new ZabbixApiException(
            message: sprintf('%s [%s]', $error['message'], self::formatErrorData($error['data'] ?? null)),
            code: $error['code'],
        );
    }

    private static function formatErrorData(mixed $data): string
    {
        if (null === $data) {
            return '';
        }

        if (is_bool($data)) {
            return $data ? 'true' : 'false';
        }

        if (is_scalar($data)) {
            return (string)$data;
        }

        return get_debug_type($data);
    }
}
