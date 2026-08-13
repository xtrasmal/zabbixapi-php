<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use Idiot\Zabbix\Api\Groups\ActionApi;
use Idiot\Zabbix\Api\Groups\AlertApi;
use Idiot\Zabbix\Api\Groups\ApiInfoApi;
use Idiot\Zabbix\Api\Groups\AuditLogApi;
use Idiot\Zabbix\Api\Groups\AuthenticationApi;
use Idiot\Zabbix\Api\Groups\AutoregistrationApi;
use Idiot\Zabbix\Api\Groups\ConnectorApi;
use Idiot\Zabbix\Api\Groups\CorrelationApi;
use Idiot\Zabbix\Api\Groups\DashboardApi;
use Idiot\Zabbix\Api\Groups\DCheckApi;
use Idiot\Zabbix\Api\Groups\DHostApi;
use Idiot\Zabbix\Api\Groups\DiscoveryRuleApi;
use Idiot\Zabbix\Api\Groups\DRuleApi;
use Idiot\Zabbix\Api\Groups\DServiceApi;
use Idiot\Zabbix\Api\Groups\EventApi;
use Idiot\Zabbix\Api\Groups\GraphApi;
use Idiot\Zabbix\Api\Groups\GraphItemApi;
use Idiot\Zabbix\Api\Groups\GraphPrototypeApi;
use Idiot\Zabbix\Api\Groups\HaNodeApi;
use Idiot\Zabbix\Api\Groups\HistoryApi;
use Idiot\Zabbix\Api\Groups\HostApi;
use Idiot\Zabbix\Api\Groups\HostGroupApi;
use Idiot\Zabbix\Api\Groups\HostInterfaceApi;
use Idiot\Zabbix\Api\Groups\HostPrototypeApi;
use Idiot\Zabbix\Api\Groups\HousekeepingApi;
use Idiot\Zabbix\Api\Groups\HttpTestApi;
use Idiot\Zabbix\Api\Groups\IconMapApi;
use Idiot\Zabbix\Api\Groups\ImageApi;
use Idiot\Zabbix\Api\Groups\ItemApi;
use Idiot\Zabbix\Api\Groups\ItemPrototypeApi;
use Idiot\Zabbix\Api\Groups\MaintenanceApi;
use Idiot\Zabbix\Api\Groups\MapApi;
use Idiot\Zabbix\Api\Groups\MediaTypeApi;
use Idiot\Zabbix\Api\Groups\MfaApi;
use Idiot\Zabbix\Api\Groups\ModuleApi;
use Idiot\Zabbix\Api\Groups\ProblemApi;
use Idiot\Zabbix\Api\Groups\ProxyApi;
use Idiot\Zabbix\Api\Groups\ProxyGroupApi;
use Idiot\Zabbix\Api\Groups\RegexpApi;
use Idiot\Zabbix\Api\Groups\ReportApi;
use Idiot\Zabbix\Api\Groups\RoleApi;
use Idiot\Zabbix\Api\Groups\ScriptApi;
use Idiot\Zabbix\Api\Groups\ServiceApi;
use Idiot\Zabbix\Api\Groups\SettingsApi;
use Idiot\Zabbix\Api\Groups\SlaApi;
use Idiot\Zabbix\Api\Groups\TaskApi;
use Idiot\Zabbix\Api\Groups\TemplateApi;
use Idiot\Zabbix\Api\Groups\TemplateDashboardApi;
use Idiot\Zabbix\Api\Groups\TemplateGroupApi;
use Idiot\Zabbix\Api\Groups\TokenApi;
use Idiot\Zabbix\Api\Groups\TrendApi;
use Idiot\Zabbix\Api\Groups\TriggerApi;
use Idiot\Zabbix\Api\Groups\TriggerPrototypeApi;
use Idiot\Zabbix\Api\Groups\UserApi;
use Idiot\Zabbix\Api\Groups\UserDirectoryApi;
use Idiot\Zabbix\Api\Groups\UserGroupApi;
use Idiot\Zabbix\Api\Groups\UserMacroApi;
use Idiot\Zabbix\Api\Groups\ValueMapApi;
use Idiot\Zabbix\Api\ZabbixApiGroup;
use Idiot\Zabbix\Api\ZabbixBatch;
use Idiot\Zabbix\Clients\JsonRpcResponse;
use Idiot\Zabbix\Requests\ApiinfoVersionRequest;
use InvalidArgumentException;
use LogicException;

class ZabbixApi
{
    public const VERSION = '1.0.0-IDIOT';

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

    private Options $options;
    private ?string $apiVersion = null;

    /** @var array<string, object> */
    private array $requestBuilders;

    private ZabbixRequestValidator $requestValidator;

    /**
     * @param array<string, mixed> $options
     *
     * @throws ZabbixApiException
     */
    public function __construct(array $options = [])
    {
        $this->options = Options::fromArray($options);

        $this->requestBuilders = $this->createRequestBuilders();
        $this->requestValidator = ZabbixRequestValidator::createDefault();

        $this->bindApiGroups();
        $this->logConfiguration();
    }

    /**
     * @throws ZabbixApiException
     */
    public function getApiVersion(): string
    {
        $this->apiVersion ??= (string)$this->fetchApiVersion();

        return $this->apiVersion;
    }

    /**
     * @throws ZabbixApiException
     */
    public function request(Request $request): mixed
    {
        return $this->executeRequests([$request])[0];
    }

    /**
     * Queue several Zabbix API calls and send them as one JSON-RPC batch.
     *
     * @param callable(): mixed|Request $requests
     *
     * @return list<mixed>
     *@throws ZabbixApiException
     *
     */
    public function batch(callable|Request ...$requests): array
    {
        return $this->executeRequests($this->collectBatchRequests($requests));
    }

    private function bindApiGroups(): void
    {
        $this->actions = $this->apiGroup($this->requestBuilder('actions'));
        $this->alerts = $this->apiGroup($this->requestBuilder('alerts'));
        $this->apiInfo = $this->apiGroup($this->requestBuilder('apiInfo'));
        $this->auditLogs = $this->apiGroup($this->requestBuilder('auditLogs'));
        $this->authentication = $this->apiGroup($this->requestBuilder('authentication'));
        $this->autoregistration = $this->apiGroup($this->requestBuilder('autoregistration'));
        $this->connectors = $this->apiGroup($this->requestBuilder('connectors'));
        $this->correlations = $this->apiGroup($this->requestBuilder('correlations'));
        $this->dashboards = $this->apiGroup($this->requestBuilder('dashboards'));
        $this->dchecks = $this->apiGroup($this->requestBuilder('dchecks'));
        $this->dhosts = $this->apiGroup($this->requestBuilder('dhosts'));
        $this->discoveryRules = $this->apiGroup($this->requestBuilder('discoveryRules'));
        $this->drules = $this->apiGroup($this->requestBuilder('drules'));
        $this->dservices = $this->apiGroup($this->requestBuilder('dservices'));
        $this->events = $this->apiGroup($this->requestBuilder('events'));
        $this->graphItems = $this->apiGroup($this->requestBuilder('graphItems'));
        $this->graphPrototypes = $this->apiGroup($this->requestBuilder('graphPrototypes'));
        $this->graphs = $this->apiGroup($this->requestBuilder('graphs'));
        $this->haNodes = $this->apiGroup($this->requestBuilder('haNodes'));
        $this->history = $this->apiGroup($this->requestBuilder('history'));
        $this->hostGroups = $this->apiGroup($this->requestBuilder('hostGroups'));
        $this->hostInterfaces = $this->apiGroup($this->requestBuilder('hostInterfaces'));
        $this->hostPrototypes = $this->apiGroup($this->requestBuilder('hostPrototypes'));
        $this->hosts = $this->apiGroup($this->requestBuilder('hosts'));
        $this->housekeeping = $this->apiGroup($this->requestBuilder('housekeeping'));
        $this->httpTests = $this->apiGroup($this->requestBuilder('httpTests'));
        $this->iconMaps = $this->apiGroup($this->requestBuilder('iconMaps'));
        $this->images = $this->apiGroup($this->requestBuilder('images'));
        $this->itemPrototypes = $this->apiGroup($this->requestBuilder('itemPrototypes'));
        $this->items = $this->apiGroup($this->requestBuilder('items'));
        $this->maintenance = $this->apiGroup($this->requestBuilder('maintenance'));
        $this->maps = $this->apiGroup($this->requestBuilder('maps'));
        $this->mediaTypes = $this->apiGroup($this->requestBuilder('mediaTypes'));
        $this->mfa = $this->apiGroup($this->requestBuilder('mfa'));
        $this->modules = $this->apiGroup($this->requestBuilder('modules'));
        $this->problems = $this->apiGroup($this->requestBuilder('problems'));
        $this->proxies = $this->apiGroup($this->requestBuilder('proxies'));
        $this->proxyGroups = $this->apiGroup($this->requestBuilder('proxyGroups'));
        $this->regexps = $this->apiGroup($this->requestBuilder('regexps'));
        $this->reports = $this->apiGroup($this->requestBuilder('reports'));
        $this->roles = $this->apiGroup($this->requestBuilder('roles'));
        $this->scripts = $this->apiGroup($this->requestBuilder('scripts'));
        $this->services = $this->apiGroup($this->requestBuilder('services'));
        $this->settings = $this->apiGroup($this->requestBuilder('settings'));
        $this->slas = $this->apiGroup($this->requestBuilder('slas'));
        $this->tasks = $this->apiGroup($this->requestBuilder('tasks'));
        $this->templateDashboards = $this->apiGroup($this->requestBuilder('templateDashboards'));
        $this->templateGroups = $this->apiGroup($this->requestBuilder('templateGroups'));
        $this->templates = $this->apiGroup($this->requestBuilder('templates'));
        $this->tokens = $this->apiGroup($this->requestBuilder('tokens'));
        $this->trends = $this->apiGroup($this->requestBuilder('trends'));
        $this->triggerPrototypes = $this->apiGroup($this->requestBuilder('triggerPrototypes'));
        $this->triggers = $this->apiGroup($this->requestBuilder('triggers'));
        $this->userDirectories = $this->apiGroup($this->requestBuilder('userDirectories'));
        $this->userGroups = $this->apiGroup($this->requestBuilder('userGroups'));
        $this->userMacros = $this->apiGroup($this->requestBuilder('userMacros'));
        $this->users = $this->apiGroup($this->requestBuilder('users'));
        $this->valueMaps = $this->apiGroup($this->requestBuilder('valueMaps'));
    }

    private function requestBuilder(string $name): object
    {
        return $this->requestBuilders[$name] ?? throw new LogicException(sprintf(
            'Unknown Zabbix API group %s.',
            $name,
        ));
    }

    /**
     * @return array<string, object>
     */
    private function createRequestBuilders(): array
    {
        return [
            'actions' => new ActionApi(),
            'alerts' => new AlertApi(),
            'apiInfo' => new ApiInfoApi(),
            'auditLogs' => new AuditLogApi(),
            'authentication' => new AuthenticationApi(),
            'autoregistration' => new AutoregistrationApi(),
            'connectors' => new ConnectorApi(),
            'correlations' => new CorrelationApi(),
            'dashboards' => new DashboardApi(),
            'dchecks' => new DCheckApi(),
            'dhosts' => new DHostApi(),
            'discoveryRules' => new DiscoveryRuleApi(),
            'drules' => new DRuleApi(),
            'dservices' => new DServiceApi(),
            'events' => new EventApi(),
            'graphItems' => new GraphItemApi(),
            'graphPrototypes' => new GraphPrototypeApi(),
            'graphs' => new GraphApi(),
            'haNodes' => new HaNodeApi(),
            'history' => new HistoryApi(),
            'hostGroups' => new HostGroupApi(),
            'hostInterfaces' => new HostInterfaceApi(),
            'hostPrototypes' => new HostPrototypeApi(),
            'hosts' => new HostApi(),
            'housekeeping' => new HousekeepingApi(),
            'httpTests' => new HttpTestApi(),
            'iconMaps' => new IconMapApi(),
            'images' => new ImageApi(),
            'itemPrototypes' => new ItemPrototypeApi(),
            'items' => new ItemApi(),
            'maintenance' => new MaintenanceApi(),
            'maps' => new MapApi(),
            'mediaTypes' => new MediaTypeApi(),
            'mfa' => new MfaApi(),
            'modules' => new ModuleApi(),
            'problems' => new ProblemApi(),
            'proxies' => new ProxyApi(),
            'proxyGroups' => new ProxyGroupApi(),
            'regexps' => new RegexpApi(),
            'reports' => new ReportApi(),
            'roles' => new RoleApi(),
            'scripts' => new ScriptApi(),
            'services' => new ServiceApi(),
            'settings' => new SettingsApi(),
            'slas' => new SlaApi(),
            'tasks' => new TaskApi(),
            'templateDashboards' => new TemplateDashboardApi(),
            'templateGroups' => new TemplateGroupApi(),
            'templates' => new TemplateApi(),
            'tokens' => new TokenApi(),
            'trends' => new TrendApi(),
            'triggerPrototypes' => new TriggerPrototypeApi(),
            'triggers' => new TriggerApi(),
            'userDirectories' => new UserDirectoryApi(),
            'userGroups' => new UserGroupApi(),
            'userMacros' => new UserMacroApi(),
            'users' => new UserApi(),
            'valueMaps' => new ValueMapApi(),
        ];
    }

    /**
     * @template TBuilder of object
     *
     * @param TBuilder $builder
     *
     * @return ZabbixApiGroup<TBuilder>
     */
    private function apiGroup(object $builder): ZabbixApiGroup
    {
        return new ZabbixApiGroup($this, $builder);
    }

    /**
     * @throws ZabbixApiException
     */
    private function logConfiguration(): void
    {
        $this->options->logger->debug('Configured Zabbix HTTP client.', [
            'endpoint' => $this->options->url,
            'library_version' => self::VERSION,
        ]);
    }

    /**
     * @param list<callable|Request> $requests
     *
     * @return list<Request>
     */
    private function collectBatchRequests(array $requests): array
    {
        if (1 === count($requests) && is_callable($requests[0]) && !$requests[0] instanceof Request) {
            $batch = new ZabbixBatch($this->requestBuilders);
            $requests[0]($batch);

            return $batch->queuedRequests();
        }

        foreach ($requests as $request) {
            if (!$request instanceof Request) {
                throw new InvalidArgumentException('Zabbix API batches only accept request objects or one batch callback.');
            }
        }

        return array_values($requests);
    }

    /**
     * @param list<Request> $requests
     *
     * @return list<mixed>
     *@throws ZabbixApiException
     *
     */
    private function executeRequests(array $requests): array
    {
        if ([] === $requests) {
            throw new ZabbixApiException('Cannot send an empty Zabbix API batch.', ZabbixApiException::CLIENT_ERROR);
        }

        foreach ($requests as $request) {
            $this->requestValidator->validate($request);
        }

        $includeVersion = $this->shouldPrefetchApiVersion();
        $sentRequests = $includeVersion
            ? [ApiinfoVersionRequest::fromParams([]), ...$requests]
            : $requests;

        return $this->resultsFromResponses(
            requests: $sentRequests,
            responses: $this->sendRequests($sentRequests),
            skipFirstResult: $includeVersion,
        );
    }

    /**
     * @throws ZabbixApiException
     */
    private function fetchApiVersion(): mixed
    {
        $request = ApiinfoVersionRequest::fromParams([]);

        return $this->resultsFromResponses(
            requests: [$request],
            responses: $this->sendRequests([$request]),
            skipFirstResult: false,
        )[0];
    }

    /**
     * @param list<Request> $requests
     *
     * @return list<JsonRpcResponse>
     */
    private function sendRequests(array $requests): array
    {
        if (1 === count($requests)) {
            return [
                $this->options->client->call(
                    request: $requests[0],
                ),
            ];
        }

        return $this->options->client->batch(
            requests: $requests,
        );
    }

    /**
     * @param list<Request>   $requests
     * @param list<JsonRpcResponse> $responses
     *
     * @return list<mixed>
     *@throws ZabbixApiException
     *
     */
    private function resultsFromResponses(array $requests, array $responses, bool $skipFirstResult): array
    {
        $results = [];

        foreach ($responses as $index => $response) {
            if (null !== $response->error) {
                throw self::zabbixError($response->error);
            }

            $result = $response->result;

            if (($requests[$index] ?? null) instanceof ApiinfoVersionRequest) {
                $this->apiVersion = (string)$result;
            }

            if (!$skipFirstResult || 0 !== $index) {
                $results[] = $result;
            }
        }

        return $results;
    }

    private function shouldPrefetchApiVersion(): bool
    {
        return null === $this->apiVersion;
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
