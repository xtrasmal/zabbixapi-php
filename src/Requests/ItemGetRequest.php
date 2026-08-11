<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * item.get - Retrieve items according to the given parameters.
 */
final class ItemGetRequest extends AbstractZabbixFilteredGetRequest
{
    public function __construct(
        public string|array|null $itemids = null,
        public string|array|null $groupids = null,
        public string|array|null $templateids = null,
        public string|array|null $hostids = null,
        public string|array|null $proxyids = null,
        public string|array|null $interfaceids = null,
        public string|array|null $graphids = null,
        public string|array|null $triggerids = null,
        public ?bool $webitems = null,
        public ?bool $inherited = null,
        public ?bool $templated = null,
        public ?bool $monitored = null,
        public ?string $group = null,
        public ?string $host = null,
        public ?Enums\ItemEvaltype $evaltype = null,
        public ?array $tags = null,
        public ?bool $with_triggers = null,
        public array|string|null $selectHosts = null,
        public array|string|null $selectInterfaces = null,
        public array|string|null $selectTriggers = null,
        public array|string|null $selectGraphs = null,
        public array|string|null $selectDiscoveryRule = null,
        public array|string|null $selectItemDiscovery = null,
        public array|string|null $selectPreprocessing = null,
        public array|string|null $selectTags = null,
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
        return 'item.get';
    }
}
