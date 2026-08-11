<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * itemprototype.get - Retrieve item prototypes according to the given parameters.
 */
final class ItemprototypeGetRequest extends AbstractZabbixFilteredGetRequest
{
    public function __construct(
        public string|array|null $discoveryids = null,
        public string|array|null $graphids = null,
        public string|array|null $hostids = null,
        public ?bool $inherited = null,
        public string|array|null $itemids = null,
        public ?bool $monitored = null,
        public ?bool $templated = null,
        public string|array|null $templateids = null,
        public string|array|null $triggerids = null,
        public array|string|null $selectDiscoveryRule = null,
        public array|string|null $selectGraphs = null,
        public array|string|null $selectHosts = null,
        public array|string|null $selectTags = null,
        public array|string|null $selectTriggers = null,
        public array|string|null $selectPreprocessing = null,
        public array|string|null $selectValueMap = null,
        public ?array $filter = null,
        public ?int $limitSelects = null,
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
    ) {}

    public function method(): string
    {
        return 'itemprototype.get';
    }
}
