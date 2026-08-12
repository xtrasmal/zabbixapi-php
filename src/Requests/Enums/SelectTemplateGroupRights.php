<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * selectTemplateGroupRights enum.
 */
enum SelectTemplateGroupRights: string
{
    case Extend = 'extend';
    case Count = 'count';
}
