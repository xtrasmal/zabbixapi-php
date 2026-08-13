<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * selectHostGroups enum.
 */
enum SelectHostGroups: string
{
    case Extend = 'extend';
    case Count = 'count';
}
