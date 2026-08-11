<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * role.get - Retrieve user roles according to the given parameters.
 */
final class RoleGetRequest extends AbstractZabbixFilteredGetRequest
{
    public function __construct(
        public string|array|null $roleids = null,
        public array|string|null $selectRules = null,
        public array|string|null $selectUsers = null,
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
        return 'role.get';
    }
}
