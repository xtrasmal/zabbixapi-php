<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * sortorder enum.
 */
enum Sortorder: string
{
    case Asc = 'ASC';
    case Desc = 'DESC';
}
