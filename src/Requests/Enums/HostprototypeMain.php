<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether the interface is used as default on the host. Only one interface of some type can be set as default on a host. Possible values: 0 - not default; 1 - default. Property behavior: required.
 */
enum HostprototypeMain: int
{
    case NotDefault = 0;
    case Default = 1;
}
