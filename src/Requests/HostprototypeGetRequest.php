<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * hostprototype.get - Retrieve host prototypes according to the given parameters.
 */
final class HostprototypeGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $hostids = null,
        public string|array|null $discoveryids = null,
        public ?bool $inherited = null,
        public array|string|null $selectDiscoveryRule = null,
        public array|string|null $selectInterfaces = null,
        public array|string|null $selectGroupLinks = null,
        public array|string|null $selectGroupPrototypes = null,
        public array|string|null $selectMacros = null,
        public array|string|null $selectParentHost = null,
        public array|string|null $selectTags = null,
        public array|string|null $selectTemplates = null,
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
        return 'hostprototype.get';
    }
}
