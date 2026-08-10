<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * alert.get - Retrieve alerts according to the given parameters.
 */
final class AlertGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $alertids = null,
        public string|array|null $actionids = null,
        public string|array|null $eventids = null,
        public string|array|null $groupids = null,
        public string|array|null $hostids = null,
        public string|array|null $mediatypeids = null,
        public string|array|null $objectids = null,
        public string|array|null $userids = null,
        public ?Enums\AlertEventobject $eventobject = null,
        public ?Enums\AlertEventsource $eventsource = null,
        public ?int $time_from = null,
        public ?int $time_till = null,
        public array|string|null $selectHosts = null,
        public array|string|null $selectMediatypes = null,
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

    public static function method(): string
    {
        return 'alert.get';
    }
}
