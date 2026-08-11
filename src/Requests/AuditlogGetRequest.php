<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * auditlog.get - Retrieve audit log records according to the given parameters. Restricted to Super admin user types (permissions manageable via user role settings).
 */
final class AuditlogGetRequest extends AbstractZabbixFilteredGetRequest
{
    public function __construct(
        public string|array|null $auditids = null,
        public string|array|null $userids = null,
        public ?int $time_from = null,
        public ?int $time_till = null,
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
        return 'auditlog.get';
    }
}
