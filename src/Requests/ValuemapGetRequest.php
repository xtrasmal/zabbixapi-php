<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * valuemap.get - Retrieve value maps according to the given parameters.
 */
final class ValuemapGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $valuemapids = null,
        public array|string|null $selectMappings = null,
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
        return 'valuemap.get';
    }
}
