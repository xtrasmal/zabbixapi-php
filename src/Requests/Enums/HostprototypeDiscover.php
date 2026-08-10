<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Host prototype discovery status. Possible values: 0 - (default) new hosts will be discovered; 1 - new hosts will not be discovered and existing hosts will be marked as lost.
 */
enum HostprototypeDiscover: int
{
    case NewHostsWillBeDiscovered = 0;
    case NewHostsWillNotBe = 1;
}
