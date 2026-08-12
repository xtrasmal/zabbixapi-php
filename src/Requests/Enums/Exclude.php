<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to exclude the user from mailing list. Possible values: 0 - (default) Include; 1 - Exclude.
 */
enum Exclude: int
{
    case Include = 0;
    case Exclude = 1;
}
