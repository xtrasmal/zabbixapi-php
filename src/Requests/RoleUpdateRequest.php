<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * role.update - Update existing user roles.
 */
final class RoleUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $roleid,
        public ?string $name = null,
        public ?Enums\RoleType $type = null,
        public ?array $rules = null,
    ) {}

    public function method(): string
    {
        return 'role.update';
    }
}
