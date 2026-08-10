<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * map.get - Retrieve maps according to the given parameters.
 */
final class MapGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $sysmapids = null,
        public string|array|null $userids = null,
        public ?bool $expandUrls = null,
        public array|string|null $selectIconMap = null,
        public array|string|null $selectLinks = null,
        public array|string|null $selectSelements = null,
        public array|string|null $selectUrls = null,
        public array|string|null $selectUsers = null,
        public array|string|null $selectUserGroups = null,
        public array|string|null $selectShapes = null,
        public array|string|null $selectLines = null,
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
        return 'map.get';
    }
}
