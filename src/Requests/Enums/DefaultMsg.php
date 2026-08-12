<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to use the default action message text and subject. Possible values: 0 - use the data from the operation; 1 - (default) use the data from the media type.
 */
enum DefaultMsg: int
{
    case UseTheDataFromThe = 0;
    case UseTheDataFromThe2 = 1;
}
