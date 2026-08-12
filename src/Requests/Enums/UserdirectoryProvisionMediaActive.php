<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * User media active property value when media is created for the provisioned user. Possible values: 0 - (default) enabled; 1 - disabled.
 */
enum UserdirectoryProvisionMediaActive: int
{
    case Enabled = 0;
    case Disabled = 1;
}
