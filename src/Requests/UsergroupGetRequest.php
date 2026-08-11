<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * usergroup.get - Retrieve user groups according to the given parameters.
 */
final class UsergroupGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $mfaids = null,
        public ?Enums\UsergroupMfaStatus $mfa_status = null,
        public ?Enums\UsergroupStatus $status = null,
        public string|array|null $userids = null,
        public string|array|null $usrgrpids = null,
        public array|string|null $selectTagFilters = null,
        public array|string|null $selectUsers = null,
        public array|string|null $selectHostGroupRights = null,
        public array|string|null $selectTemplateGroupRights = null,
        public ?int $limitSelects = null,
        public array|string|null $output = null,
        public string|array|null $sortfield = null,
        public array|string|null $selectRights = null,
        public ?bool $countOutput = null,
        public ?bool $editable = null,
        public ?bool $excludeSearch = null,
        public ?array $filter = null,
        public ?int $limit = null,
        public ?bool $preservekeys = null,
        public ?array $search = null,
        public ?bool $searchByAny = null,
        public ?bool $searchWildcardsEnabled = null,
        public string|array|null $sortorder = null,
        public ?bool $startSearch = null,
    ) {}

    public function method(): string
    {
        return 'usergroup.get';
    }
}
