<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use Idiot\Zabbix\Api\ApiGroup;
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
use Idiot\Zabbix\Api\Requests\ApiinfoVersionRequest;
use Idiot\Zabbix\Api\ZabbixBatch;
use Idiot\Zabbix\Clients\JsonRpcResponse;
use InvalidArgumentException;

/**
 * @param ApiGroup<ActionApi>            $actions
 * @param ApiGroup<AlertApi>             $alerts
 * @param ApiGroup<AutoregistrationApi>  $autoregistration
 * @param ApiGroup<ConnectorApi>         $connectors
 * @param ApiGroup<CorrelationApi>       $correlations
 * @param ApiGroup<DashboardApi>         $dashboards
 * @param ApiGroup<DCheckApi>            $dChecks
 * @param ApiGroup<DHostApi>             $dHosts
 * @param ApiGroup<DiscoveryRuleApi>     $discoveryRules
 * @param ApiGroup<DRuleApi>             $dRules
 * @param ApiGroup<DServiceApi>          $dServices
 * @param ApiGroup<EventApi>             $events
 * @param ApiGroup<GraphItemApi>         $graphItems
 * @param ApiGroup<GraphPrototypeApi>    $graphPrototypes
 * @param ApiGroup<GraphApi>             $graphs
 * @param ApiGroup<HaNodeApi>            $haNodes
 * @param ApiGroup<HistoryApi>           $histories
 * @param ApiGroup<HostGroupApi>         $hostGroups
 * @param ApiGroup<HostInterfaceApi>     $hostInterfaces
 * @param ApiGroup<HostPrototypeApi>     $hostPrototypes
 * @param ApiGroup<HostApi>              $hosts
 * @param ApiGroup<HousekeepingApi>      $housekeeping
 * @param ApiGroup<HttpTestApi>          $httpTests
 * @param ApiGroup<IconMapApi>           $iconMaps
 * @param ApiGroup<ImageApi>             $images
 * @param ApiGroup<ItemPrototypeApi>     $itemPrototypes
 * @param ApiGroup<ItemApi>              $items
 * @param ApiGroup<MaintenanceApi>       $maintenances
 * @param ApiGroup<MapApi>               $maps
 * @param ApiGroup<MediaTypeApi>         $mediaTypes
 * @param ApiGroup<MfaApi>               $mfas
 * @param ApiGroup<ModuleApi>            $modules
 * @param ApiGroup<ProblemApi>           $problems
 * @param ApiGroup<ProxyApi>             $proxies
 * @param ApiGroup<ProxyGroupApi>        $proxyGroups
 * @param ApiGroup<RegexpApi>            $regexps
 * @param ApiGroup<ReportApi>            $reports
 * @param ApiGroup<RoleApi>              $roles
 * @param ApiGroup<ScriptApi>            $scripts
 * @param ApiGroup<ServiceApi>           $services
 * @param ApiGroup<SettingsApi>          $settings
 * @param ApiGroup<SlaApi>               $slas
 * @param ApiGroup<TaskApi>              $tasks
 * @param ApiGroup<TemplateDashboardApi> $templateDashboards
 * @param ApiGroup<TemplateGroupApi>     $templateGroups
 * @param ApiGroup<TemplateApi>          $templates
 * @param ApiGroup<TokenApi>             $tokens
 * @param ApiGroup<TrendApi>             $trends
 * @param ApiGroup<TriggerPrototypeApi>  $triggerPrototypes
 * @param ApiGroup<TriggerApi>           $triggers
 * @param ApiGroup<UserDirectoryApi>     $userDirectories
 * @param ApiGroup<UserGroupApi>         $userGroups
 * @param ApiGroup<UserMacroApi>         $userMacros
 * @param ApiGroup<UserApi>              $users
 * @param ApiGroup<ValueMapApi>          $valueMaps
 */
class ZabbixApi
{
    public const VERSION = '1.0.0-IDIOT';

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
     * @throws ZabbixApiException
     *
     * @return list<mixed>
     */
    public function batch(callable|Request ...$requests): array
    {
        return $this->executeRequests($this->collectBatchRequests($requests));
    }

    private function bindApiGroups(): void
    {
        foreach ($this->createRequestBuilders() as $name => $builder) {
            $this->{$name} = $this->apiGroup($builder);
        }
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
     * @return ApiGroup<TBuilder>
     */
    private function apiGroup(object $builder): ApiGroup
    {
        return new ApiGroup($this, $builder);
    }

    /**
     * @param list<Request> $requests
     *
     * @throws ZabbixApiException
     *
     * @return list<mixed>
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
     * @param list<Request>         $requests
     * @param list<JsonRpcResponse> $responses
     *
     * @throws ZabbixApiException
     *
     * @return list<mixed>
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
