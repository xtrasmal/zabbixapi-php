<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * sla.get - Retrieve SLA objects according to the given parameters.
 */
final class SlaGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $slaids = null,
        public string|array|null $serviceids = null,
        public array|string|null $selectSchedule = null,
        public array|string|null $selectExcludedDowntimes = null,
        public array|string|null $selectServiceTags = null,
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
        public string|array|null $sortfield = null,
        public string|array|null $sortorder = null,
        public ?bool $startSearch = null,
    ) {}

    public function method(): string
    {
        return 'sla.get';
    }
}
