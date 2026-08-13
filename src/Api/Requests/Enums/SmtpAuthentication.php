<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * SMTP authentication method to use.  Possible values: 0 - (default) None; 1 - Normal password.  Property behavior: - supported if type is set to "Email"
 */
enum SmtpAuthentication: int
{
    case None = 0;
    case NormalPassword = 1;
}
