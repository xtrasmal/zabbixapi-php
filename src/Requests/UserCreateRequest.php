<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * user.create - Create new users.
 */
final class UserCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $username,
        public ?string $passwd = null,
        public ?string $roleid = null,
        public ?Enums\Autologin $autologin = null,
        public ?string $autologout = null,
        public ?string $lang = null,
        public ?string $name = null,
        public ?string $refresh = null,
        public ?int $rows_per_page = null,
        public ?string $surname = null,
        public ?Enums\Theme $theme = null,
        public ?string $url = null,
        public ?array $usrgrps = null,
        public ?array $medias = null,
    ) {}

    public function method(): string
    {
        return 'user.create';
    }
}
