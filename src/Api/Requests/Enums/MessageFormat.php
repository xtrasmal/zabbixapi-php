<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Message format.  Possible values: 0 - Plain text; 1 - (default) HTML.  Property behavior: - supported if type is set to "Email"
 */
enum MessageFormat: int
{
    case PlainText = 0;
    case Html = 1;
}
