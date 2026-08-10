<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * triggerprototype.get - Retrieve trigger prototypes according to the given parameters.
 */
final class TriggerprototypeGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public ?bool $active = null,
        public string|array|null $discoveryids = null,
        public string|array|null $functions = null,
        public ?string $group = null,
        public string|array|null $groupids = null,
        public ?string $host = null,
        public string|array|null $hostids = null,
        public ?bool $inherited = null,
        public ?bool $maintenance = null,
        public ?int $min_severity = null,
        public ?bool $monitored = null,
        public ?bool $templated = null,
        public string|array|null $templateids = null,
        public string|array|null $triggerids = null,
        public ?bool $expandExpression = null,
        public array|string|null $selectDependencies = null,
        public array|string|null $selectDiscoveryRule = null,
        public array|string|null $selectFunctions = null,
        public array|string|null $selectHostGroups = null,
        public array|string|null $selectHosts = null,
        public array|string|null $selectItems = null,
        public array|string|null $selectTags = null,
        public array|string|null $selectTemplateGroups = null,
        public ?array $filter = null,
        public ?int $limitSelects = null,
        public string|array|null $sortfield = null,
        public array|string|null $selectGroups = null,
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
        return 'triggerprototype.get';
    }
}
