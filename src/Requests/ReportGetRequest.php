<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * report.get - Retrieve scheduled reports according to the given parameters.
 */
final class ReportGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $reportids = null,
        public ?bool $expired = null,
        public array|string|null $selectUsers = null,
        public array|string|null $selectUserGroups = null,
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
        return 'report.get';
    }
}
