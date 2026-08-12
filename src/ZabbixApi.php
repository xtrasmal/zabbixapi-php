<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix;

use GuzzleHttp\ClientInterface;
use IntelliTrend\Zabbix\Api\ZabbixApiGroup;
use IntelliTrend\Zabbix\Api\ZabbixRequestApi;
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
    private ZabbixRequestApi $requests;

    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ActionApi> */
    public readonly ZabbixApiGroup $actions;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\AlertApi> */
    public readonly ZabbixApiGroup $alerts;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ApiInfoApi> */
    public readonly ZabbixApiGroup $apiInfo;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\AuditLogApi> */
    public readonly ZabbixApiGroup $auditLogs;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\AuthenticationApi> */
    public readonly ZabbixApiGroup $authentication;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\AutoregistrationApi> */
    public readonly ZabbixApiGroup $autoregistration;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ConnectorApi> */
    public readonly ZabbixApiGroup $connectors;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\CorrelationApi> */
    public readonly ZabbixApiGroup $correlations;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\DashboardApi> */
    public readonly ZabbixApiGroup $dashboards;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\DCheckApi> */
    public readonly ZabbixApiGroup $dchecks;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\DHostApi> */
    public readonly ZabbixApiGroup $dhosts;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\DiscoveryRuleApi> */
    public readonly ZabbixApiGroup $discoveryRules;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\DRuleApi> */
    public readonly ZabbixApiGroup $drules;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\DServiceApi> */
    public readonly ZabbixApiGroup $dservices;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\EventApi> */
    public readonly ZabbixApiGroup $events;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\GraphItemApi> */
    public readonly ZabbixApiGroup $graphItems;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\GraphPrototypeApi> */
    public readonly ZabbixApiGroup $graphPrototypes;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\GraphApi> */
    public readonly ZabbixApiGroup $graphs;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\HaNodeApi> */
    public readonly ZabbixApiGroup $haNodes;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\HistoryApi> */
    public readonly ZabbixApiGroup $history;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\HostGroupApi> */
    public readonly ZabbixApiGroup $hostGroups;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\HostInterfaceApi> */
    public readonly ZabbixApiGroup $hostInterfaces;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\HostPrototypeApi> */
    public readonly ZabbixApiGroup $hostPrototypes;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\HostApi> */
    public readonly ZabbixApiGroup $hosts;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\HousekeepingApi> */
    public readonly ZabbixApiGroup $housekeeping;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\HttpTestApi> */
    public readonly ZabbixApiGroup $httpTests;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\IconMapApi> */
    public readonly ZabbixApiGroup $iconMaps;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ImageApi> */
    public readonly ZabbixApiGroup $images;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ItemPrototypeApi> */
    public readonly ZabbixApiGroup $itemPrototypes;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ItemApi> */
    public readonly ZabbixApiGroup $items;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\MaintenanceApi> */
    public readonly ZabbixApiGroup $maintenance;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\MapApi> */
    public readonly ZabbixApiGroup $maps;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\MediaTypeApi> */
    public readonly ZabbixApiGroup $mediaTypes;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\MfaApi> */
    public readonly ZabbixApiGroup $mfa;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ModuleApi> */
    public readonly ZabbixApiGroup $modules;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ProblemApi> */
    public readonly ZabbixApiGroup $problems;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ProxyApi> */
    public readonly ZabbixApiGroup $proxies;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ProxyGroupApi> */
    public readonly ZabbixApiGroup $proxyGroups;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\RegexpApi> */
    public readonly ZabbixApiGroup $regexps;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ReportApi> */
    public readonly ZabbixApiGroup $reports;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\RoleApi> */
    public readonly ZabbixApiGroup $roles;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ScriptApi> */
    public readonly ZabbixApiGroup $scripts;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ServiceApi> */
    public readonly ZabbixApiGroup $services;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\SettingsApi> */
    public readonly ZabbixApiGroup $settings;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\SlaApi> */
    public readonly ZabbixApiGroup $slas;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\TaskApi> */
    public readonly ZabbixApiGroup $tasks;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\TemplateDashboardApi> */
    public readonly ZabbixApiGroup $templateDashboards;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\TemplateGroupApi> */
    public readonly ZabbixApiGroup $templateGroups;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\TemplateApi> */
    public readonly ZabbixApiGroup $templates;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\TokenApi> */
    public readonly ZabbixApiGroup $tokens;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\TrendApi> */
    public readonly ZabbixApiGroup $trends;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\TriggerPrototypeApi> */
    public readonly ZabbixApiGroup $triggerPrototypes;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\TriggerApi> */
    public readonly ZabbixApiGroup $triggers;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\UserDirectoryApi> */
    public readonly ZabbixApiGroup $userDirectories;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\UserGroupApi> */
    public readonly ZabbixApiGroup $userGroups;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\UserMacroApi> */
    public readonly ZabbixApiGroup $userMacros;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\UserApi> */
    public readonly ZabbixApiGroup $users;
    /** @var ZabbixApiGroup<\IntelliTrend\Zabbix\Api\ValueMapApi> */
    public readonly ZabbixApiGroup $valueMaps;

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
        $this->requests = new ZabbixRequestApi();
        $this->bindApiGroups();
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

    public function requests(): ZabbixRequestApi
    {
        return $this->requests;
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
