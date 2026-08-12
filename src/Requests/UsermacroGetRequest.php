<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * usermacro.get - Retrieve host and global macros according to the given parameters.
 */
final class UsermacroGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public ?bool $globalmacro = null,
        public string|array|null $globalmacroids = null,
        public string|array|null $groupids = null,
        public string|array|null $hostids = null,
        public string|array|null $hostmacroids = null,
        public ?bool $inherited = null,
        public array|string|null $selectHostGroups = null,
        public array|string|null $selectHosts = null,
        public array|string|null $selectTemplateGroups = null,
        public array|string|null $selectTemplates = null,
        public array|string|null $selectGroups = null,
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
        return 'usermacro.get';
    }
}
