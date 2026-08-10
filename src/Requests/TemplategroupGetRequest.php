<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * templategroup.get - Retrieve template groups according to the given parameters.
 */
final class TemplategroupGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $graphids = null,
        public string|array|null $groupids = null,
        public string|array|null $templateids = null,
        public string|array|null $triggerids = null,
        public ?bool $with_graphs = null,
        public ?bool $with_graph_prototypes = null,
        public ?bool $with_httptests = null,
        public ?bool $with_items = null,
        public ?bool $with_item_prototypes = null,
        public ?bool $with_simple_graph_item_prototypes = null,
        public ?bool $with_simple_graph_items = null,
        public ?bool $with_templates = null,
        public ?bool $with_triggers = null,
        public array|string|null $selectTemplates = null,
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

    public static function method(): string
    {
        return 'templategroup.get';
    }
}
