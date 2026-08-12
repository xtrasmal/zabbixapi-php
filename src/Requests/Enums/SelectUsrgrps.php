<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectUsrgrps enum.
 */
enum SelectUsrgrps: string
{
    case Extend = 'extend';
    case Count = 'count';
}
