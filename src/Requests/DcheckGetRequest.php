<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * dcheck.get - Retrieve discovery checks according to the given parameters.
 */
final class DcheckGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $dcheckids = null,
        public string|array|null $druleids = null,
        public string|array|null $dserviceids = null,
        public array|string|null $selectDRules = null,
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
        return 'dcheck.get';
    }
}
