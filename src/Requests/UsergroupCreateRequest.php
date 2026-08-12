<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * usergroup.create - Create new user groups.
 */
final class UsergroupCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public ?Enums\DebugMode $debug_mode = null,
        public ?Enums\GuiAccess $gui_access = null,
        public ?Enums\UsergroupMfaStatus $mfa_status = null,
        public ?string $mfaid = null,
        public ?Enums\UsersStatus $users_status = null,
        public ?string $userdirectoryid = null,
        public ?array $hostgroup_rights = null,
        public ?array $templategroup_rights = null,
        public ?array $tag_filters = null,
        public ?array $users = null,
        public ?array $rights = null,
    ) {}

    public function method(): string
    {
        return 'usergroup.create';
    }
}
