<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * graph.get - Retrieve graphs according to the given parameters.
 */
final class GraphGetRequest extends AbstractZabbixFilteredGetRequest
{
    public function __construct(
        public string|array|null $graphids = null,
        public string|array|null $groupids = null,
        public string|array|null $templateids = null,
        public string|array|null $hostids = null,
        public string|array|null $itemids = null,
        public ?bool $templated = null,
        public ?bool $inherited = null,
        public ?bool $expandName = null,
        public array|string|null $selectHostGroups = null,
        public array|string|null $selectTemplateGroups = null,
        public array|string|null $selectTemplates = null,
        public array|string|null $selectHosts = null,
        public array|string|null $selectItems = null,
        public array|string|null $selectGraphDiscovery = null,
        public array|string|null $selectGraphItems = null,
        public array|string|null $selectDiscoveryRule = null,
        public ?array $filter = null,
        public string|array|null $sortfield = null,
        public ?bool $countOutput = null,
        public ?bool $editable = null,
        public ?bool $excludeSearch = null,
        public ?int $limit = null,
        public array|string|null $output = null,
        public ?bool $preservekeys = null,
        public ?array $search = null,
        public ?bool $searchByAny = null,
        public ?bool $searchWildcardsEnabled = null,
        public string|array|null $sortorder = null,
        public ?bool $startSearch = null,
        public array|string|null $selectGroups = null,
    ) {}

    public function method(): string
    {
        return 'graph.get';
    }
}
