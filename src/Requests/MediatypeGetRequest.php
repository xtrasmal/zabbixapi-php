<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * mediatype.get - Retrieve media types according to the given parameters.
 */
final class MediatypeGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $mediatypeids = null,
        public string|array|null $mediaids = null,
        public string|array|null $userids = null,
        public array|string|null $selectActions = null,
        public array|string|null $selectMessageTemplates = null,
        public array|string|null $selectUsers = null,
        public ?array $filter = null,
        public array|string|null $output = null,
        public ?array $search = null,
        public string|array|null $sortfield = null,
        public ?bool $countOutput = null,
        public ?bool $editable = null,
        public ?bool $excludeSearch = null,
        public ?int $limit = null,
        public ?bool $preservekeys = null,
        public ?bool $searchByAny = null,
        public ?bool $searchWildcardsEnabled = null,
        public string|array|null $sortorder = null,
        public ?bool $startSearch = null,
    ) {}

    public function method(): string
    {
        return 'mediatype.get';
    }
}
