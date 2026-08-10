<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * usergroup.update - Update existing user groups.
 */
final class UsergroupUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $usrgrpid,
        public ?string $name = null,
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

    public static function method(): string
    {
        return 'usergroup.update';
    }
}
