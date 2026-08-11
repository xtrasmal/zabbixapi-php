<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * action.get - Retrieve actions according to the given parameters.
 */
final class ActionGetRequest extends AbstractZabbixFilteredGetRequest
{
    public function __construct(
        public string|array|null $actionids = null,
        public string|array|null $groupids = null,
        public string|array|null $hostids = null,
        public string|array|null $triggerids = null,
        public string|array|null $mediatypeids = null,
        public string|array|null $usrgrpids = null,
        public string|array|null $userids = null,
        public string|array|null $scriptids = null,
        public array|string|null $selectFilter = null,
        public array|string|null $selectOperations = null,
        public array|string|null $selectRecoveryOperations = null,
        public array|string|null $selectUpdateOperations = null,
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
        return 'action.get';
    }
}
