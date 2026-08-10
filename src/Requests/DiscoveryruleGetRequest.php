<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * discoveryrule.get - Retrieve LLD rules according to the given parameters.
 */
final class DiscoveryruleGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $itemids = null,
        public string|array|null $groupids = null,
        public string|array|null $hostids = null,
        public ?bool $inherited = null,
        public string|array|null $interfaceids = null,
        public ?bool $monitored = null,
        public ?bool $templated = null,
        public string|array|null $templateids = null,
        public array|string|null $selectFilter = null,
        public array|string|null $selectGraphs = null,
        public array|string|null $selectHostPrototypes = null,
        public array|string|null $selectHosts = null,
        public array|string|null $selectItems = null,
        public array|string|null $selectTriggers = null,
        public array|string|null $selectLLDMacroPaths = null,
        public array|string|null $selectPreprocessing = null,
        public array|string|null $selectOverrides = null,
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

    public static function method(): string
    {
        return 'discoveryrule.get';
    }
}
