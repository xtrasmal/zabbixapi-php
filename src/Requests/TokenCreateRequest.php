<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * token.create - Create new tokens. A token created by this method also has to be generated (token.generate) before it is usable.
 */
final class TokenCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public ?string $description = null,
        public ?string $userid = null,
        public ?Enums\TokenStatus $status = null,
        public ?int $expires_at = null,
    ) {}

    public function method(): string
    {
        return 'token.create';
    }
}
