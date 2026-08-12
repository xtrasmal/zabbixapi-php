<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * template.get - Retrieve templates according to the given parameters.
 */
final class TemplateGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $templateids = null,
        public string|array|null $groupids = null,
        public string|array|null $parentTemplateids = null,
        public string|array|null $hostids = null,
        public string|array|null $graphids = null,
        public string|array|null $itemids = null,
        public string|array|null $triggerids = null,
        public ?bool $with_items = null,
        public ?bool $with_triggers = null,
        public ?bool $with_graphs = null,
        public ?bool $with_httptests = null,
        public ?Enums\TemplateEvaltype $evaltype = null,
        public ?array $tags = null,
        public array|string|null $selectTags = null,
        public array|string|null $selectHosts = null,
        public array|string|null $selectTemplateGroups = null,
        public array|string|null $selectTemplates = null,
        public array|string|null $selectParentTemplates = null,
        public array|string|null $selectHttpTests = null,
        public array|string|null $selectItems = null,
        public array|string|null $selectDiscoveries = null,
        public array|string|null $selectTriggers = null,
        public array|string|null $selectGraphs = null,
        public array|string|null $selectMacros = null,
        public array|string|null $selectDashboards = null,
        public array|string|null $selectValueMaps = null,
        public array|string|null $selectGroups = null,
        public ?int $limitSelects = null,
        public string|array|null $sortfield = null,
        public ?bool $countOutput = null,
        public ?bool $editable = null,
        public ?bool $excludeSearch = null,
        public ?array $filter = null,
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
        return 'template.get';
    }
}
