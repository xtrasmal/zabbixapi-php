<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * trigger.get - Retrieve triggers according to the given parameters.
 */
final class TriggerGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $triggerids = null,
        public string|array|null $groupids = null,
        public string|array|null $templateids = null,
        public string|array|null $hostids = null,
        public string|array|null $itemids = null,
        public string|array|null $functions = null,
        public ?string $group = null,
        public ?string $host = null,
        public ?bool $inherited = null,
        public ?bool $templated = null,
        public ?bool $dependent = null,
        public ?bool $monitored = null,
        public ?bool $active = null,
        public ?bool $maintenance = null,
        public ?bool $withUnacknowledgedEvents = null,
        public ?bool $withAcknowledgedEvents = null,
        public ?bool $withLastEventUnacknowledged = null,
        public ?bool $skipDependent = null,
        public ?int $lastChangeSince = null,
        public ?int $lastChangeTill = null,
        public ?bool $only_true = null,
        public ?int $min_severity = null,
        public ?Enums\TriggerEvaltype $evaltype = null,
        public ?array $tags = null,
        public ?bool $expandComment = null,
        public ?bool $expandDescription = null,
        public ?bool $expandExpression = null,
        public array|string|null $selectHostGroups = null,
        public array|string|null $selectHosts = null,
        public array|string|null $selectItems = null,
        public array|string|null $selectFunctions = null,
        public array|string|null $selectDependencies = null,
        public array|string|null $selectDiscoveryRule = null,
        public array|string|null $selectLastEvent = null,
        public array|string|null $selectTags = null,
        public array|string|null $selectTemplateGroups = null,
        public array|string|null $selectTriggerDiscovery = null,
        public array|string|null $selectGroups = null,
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
        return 'trigger.get';
    }
}
