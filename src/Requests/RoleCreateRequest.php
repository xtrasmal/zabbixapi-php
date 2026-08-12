<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * role.create - Create new user roles.
 */
final class RoleCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public Enums\RoleType $type,
        public ?array $rules = null,
    ) {}

    public function method(): string
    {
        return 'role.create';
    }
}
