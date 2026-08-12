<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to use bulk SNMP requests. Possible values: 0 - don't use bulk requests; 1 - (default) - use bulk requests.
 */
enum HostinterfaceDetailsBulk: int
{
    case DonTUseBulkRequests = 0;
    case UseBulkRequests = 1;
}
