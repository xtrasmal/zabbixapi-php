<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Horizontal alignment of text. Possible values: 0 - center; 1 - left; 2 - right. Default: 0.
 */
enum TextHalign: int
{
    case Center = 0;
    case Left = 1;
    case Right = 2;
}
