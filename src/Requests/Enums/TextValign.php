<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Vertical alignment of text. Possible values: 0 - middle; 1 - top; 2 - bottom. Default: 0.
 */
enum TextValign: int
{
    case Middle = 0;
    case Top = 1;
    case Bottom = 2;
}
