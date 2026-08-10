<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * userdirectory.get - Retrieve user directories according to the given parameters.
 */
final class UserdirectoryGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $userdirectoryids = null,
        public array|string|null $selectUsrgrps = null,
        public array|string|null $selectProvisionMedia = null,
        public array|string|null $selectProvisionGroups = null,
        public ?array $filter = null,
        public ?array $search = null,
        public string|array|null $sortfield = null,
        public ?bool $countOutput = null,
        public ?bool $editable = null,
        public ?bool $excludeSearch = null,
        public ?int $limit = null,
        public array|string|null $output = null,
        public ?bool $preservekeys = null,
        public ?bool $searchByAny = null,
        public ?bool $searchWildcardsEnabled = null,
        public string|array|null $sortorder = null,
        public ?bool $startSearch = null,
    ) {}

    public static function method(): string
    {
        return 'userdirectory.get';
    }
}
