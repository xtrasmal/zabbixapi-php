<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Authentication method used for SSH script type. Supported if type is set to "SSH". Possible values: 0 - password; 1 - public key.
 */
enum ScriptAuthtype: int
{
    case Password = 0;
    case PublicKey = 1;
}
