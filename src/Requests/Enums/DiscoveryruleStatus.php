<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Status of the LLD rule. Possible values: 0 - (default) enabled LLD rule; 1 - disabled LLD rule.
 */
enum DiscoveryruleStatus: int
{
    case EnabledLldRule = 0;
    case DisabledLldRule = 1;
}
