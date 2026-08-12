<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Status of the SLA. Possible values: 0 - (default) disabled SLA; 1 - enabled SLA.
 */
enum SlaStatus: int
{
    case DisabledSla = 0;
    case EnabledSla = 1;
}
