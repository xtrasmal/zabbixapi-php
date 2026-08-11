<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * mfa.get - Retrieve MFA methods according to the given parameters.
 */
final class MfaGetRequest extends AbstractZabbixFilteredGetRequest
{
    public function __construct(
        public string|array|null $mfaids = null,
        public array|string|null $selectUsrgrps = null,
        public ?array $filter = null,
        public string|array|null $sortfield = null,
        public ?array $search = null,
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

    public function method(): string
    {
        return 'mfa.get';
    }
}
