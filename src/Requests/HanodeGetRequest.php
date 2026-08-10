<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * hanode.get - Retrieve a list of High availability cluster nodes according to the given parameters. Only available to Super admin user types.
 */
final class HanodeGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $ha_nodeids = null,
        public ?array $filter = null,
        public string|array|null $sortfield = null,
        public ?bool $countOutput = null,
        public ?bool $editable = null,
        public ?bool $excludeSearch = null,
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
        return 'hanode.get';
    }
}
