<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether to validate that the host name for the connection matches the one in the host's certificate. Possible values: 0 - Do not validate; 1 - (default) Validate.
 */
enum ConnectorVerifyHost: int
{
    case DoNotValidate = 0;
    case Validate = 1;
}
