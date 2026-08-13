<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * LDAP case-sensitive login. Possible values: 0 - Off; 1 - (default) On.
 */
enum LdapCaseSensitive: int
{
    case Off = 0;
    case On = 1;
}
