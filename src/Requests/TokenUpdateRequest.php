<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * token.update - Update existing tokens. The tokenid property must be defined for each token; all other properties are optional and only passed properties will be updated.
 */
final class TokenUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $tokenid,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $userid = null,
        public ?Enums\TokenStatus $status = null,
        public ?int $expires_at = null,
    ) {}

    public function method(): string
    {
        return 'token.update';
    }
}
