<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * dhost.get - Retrieve discovered hosts according to the given parameters.
 */
final class DhostGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $dhostids = null,
        public string|array|null $druleids = null,
        public string|array|null $dserviceids = null,
        public array|string|null $selectDRules = null,
        public array|string|null $selectDServices = null,
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
        return 'dhost.get';
    }
}
