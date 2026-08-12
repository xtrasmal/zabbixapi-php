<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Return only user groups with the given status (users_status). Possible values: 0 - (default) enabled; 1 - disabled.
 */
enum UsergroupStatus: int
{
    case Enabled = 0;
    case Disabled = 1;
}
