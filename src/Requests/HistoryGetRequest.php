<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * history.get - Retrieve history data according to the given parameters. May return historical data of a deleted entity if this data has not been removed by the housekeeper yet.
 */
final class HistoryGetRequest extends AbstractZabbixFilteredGetRequest
{
    public function __construct(
        public ?Enums\History $history = null,
        public string|array|null $hostids = null,
        public string|array|null $itemids = null,
        public ?int $time_from = null,
        public ?int $time_till = null,
        public string|array|null $sortfield = null,
        public ?bool $countOutput = null,
        public ?bool $editable = null,
        public ?bool $excludeSearch = null,
        public ?array $filter = null,
        public ?int $limit = null,
        public array|string|null $output = null,
        public ?array $search = null,
        public ?bool $searchByAny = null,
        public ?bool $searchWildcardsEnabled = null,
        public string|array|null $sortorder = null,
        public ?bool $startSearch = null,
    ) {}

    public function method(): string
    {
        return 'history.get';
    }
}
