<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Type of image. Possible values: 1 - (default) icon; 2 - background image. This property is constant and cannot be changed after creation.
 */
enum ImageImagetype: int
{
    case Icon = 1;
    case BackgroundImage = 2;
}
