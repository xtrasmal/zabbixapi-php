<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * host.get - Retrieve hosts according to the given parameters.
 */
final class HostGetRequest extends AbstractZabbixFilteredGetRequest
{
    public function __construct(
        public string|array|null $groupids = null,
        public string|array|null $dserviceids = null,
        public string|array|null $graphids = null,
        public string|array|null $hostids = null,
        public string|array|null $httptestids = null,
        public string|array|null $interfaceids = null,
        public string|array|null $itemids = null,
        public string|array|null $maintenanceids = null,
        public ?bool $monitored_hosts = null,
        public string|array|null $proxyids = null,
        public string|array|null $proxy_groupids = null,
        public ?bool $templated_hosts = null,
        public string|array|null $templateids = null,
        public string|array|null $triggerids = null,
        public ?bool $with_items = null,
        public ?bool $with_item_prototypes = null,
        public ?bool $with_simple_graph_item_prototypes = null,
        public ?bool $with_graphs = null,
        public ?bool $with_graph_prototypes = null,
        public ?bool $with_httptests = null,
        public ?bool $with_monitored_httptests = null,
        public ?bool $with_monitored_items = null,
        public ?bool $with_monitored_triggers = null,
        public ?bool $with_simple_graph_items = null,
        public ?bool $with_triggers = null,
        public ?bool $withProblemsSuppressed = null,
        public ?Enums\HostEvaltype $evaltype = null,
        public int|array|null $severities = null,
        public ?array $tags = null,
        public ?bool $inheritedTags = null,
        public array|string|null $selectDiscoveries = null,
        public array|string|null $selectDiscoveryRule = null,
        public array|string|null $selectGraphs = null,
        public array|string|null $selectHostDiscovery = null,
        public array|string|null $selectHostGroups = null,
        public array|string|null $selectHttpTests = null,
        public array|string|null $selectInterfaces = null,
        public array|string|null $selectInventory = null,
        public array|string|null $selectItems = null,
        public array|string|null $selectMacros = null,
        public array|string|null $selectParentTemplates = null,
        public array|string|null $selectDashboards = null,
        public array|string|null $selectTags = null,
        public array|string|null $selectInheritedTags = null,
        public array|string|null $selectTriggers = null,
        public array|string|null $selectValueMaps = null,
        public array|string|null $selectGroups = null,
        public ?array $filter = null,
        public ?int $limitSelects = null,
        public ?array $search = null,
        public ?array $searchInventory = null,
        public string|array|null $sortfield = null,
        public ?bool $countOutput = null,
        public ?bool $editable = null,
        public ?bool $excludeSearch = null,
        public ?int $limit = null,
        public array|string|null $output = null,
        public ?bool $preservekeys = null,
        public ?bool $searchByAny = null,
        public ?bool $searchWildcardsEnabled = null,
        public string|array|null $sortorder = null,
        public ?bool $startSearch = null,
    ) {}

    /** @param array<string, mixed> $params */
    public static function byManualParams(array $params): self
    {
        return self::fromParams($params);
    }

    public function method(): string
    {
        return 'host.get';
    }
}
