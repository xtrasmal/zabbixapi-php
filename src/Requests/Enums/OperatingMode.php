<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Type of proxy. Possible values: 0 - active proxy; 1 - passive proxy. Property behavior: required for create operations.
 */
enum OperatingMode: int
{
    case ActiveProxy = 0;
    case PassiveProxy = 1;
}
