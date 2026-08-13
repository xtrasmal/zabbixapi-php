<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Size of the map grid in pixels. Supported values: 20, 40, 50, 75 and 100. Default: 50.
 */
enum GridSize: int
{
    case V20 = 20;
    case V40 = 40;
    case V50 = 50;
    case V75 = 75;
    case V100 = 100;
}
