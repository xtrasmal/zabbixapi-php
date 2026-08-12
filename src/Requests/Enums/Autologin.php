<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to enable auto-login. Possible values: 0 - (default) auto-login disabled; 1 - auto-login enabled.
 */
enum Autologin: int
{
    case AutoLoginDisabled = 0;
    case AutoLoginEnabled = 1;
}
