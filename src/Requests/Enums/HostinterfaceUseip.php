<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether the connection should be made via IP. Possible values: 0 - connect using host DNS name; 1 - connect using host IP address. Property behavior: required for create operations.
 */
enum HostinterfaceUseip: int
{
    case ConnectUsingHostDnsName = 0;
    case ConnectUsingHostIpAddress = 1;
}
