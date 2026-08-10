<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * hostinterface.get - Retrieve host interfaces according to the given parameters.
 */
final class HostinterfaceGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $hostids = null,
        public string|array|null $interfaceids = null,
        public string|array|null $itemids = null,
        public string|array|null $triggerids = null,
        public array|string|null $selectItems = null,
        public array|string|null $selectHosts = null,
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
        return 'hostinterface.get';
    }
}
