<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * token.get - Retrieve tokens according to the given parameters.
 */
final class TokenGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $tokenids = null,
        public string|array|null $userids = null,
        public ?string $token = null,
        public ?int $valid_at = null,
        public ?int $expired_at = null,
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
        return 'token.get';
    }
}
