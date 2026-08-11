<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * drule.get - Retrieve network discovery rules according to the given parameters.
 */
final class DruleGetRequest extends AbstractZabbixFilteredGetRequest
{
    public function __construct(
        public string|array|null $dhostids = null,
        public string|array|null $druleids = null,
        public string|array|null $dserviceids = null,
        public array|string|null $selectDChecks = null,
        public array|string|null $selectDHosts = null,
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
        return 'drule.get';
    }
}
