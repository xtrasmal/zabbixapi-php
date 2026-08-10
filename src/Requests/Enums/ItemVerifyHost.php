<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether to validate that the host name for the connection matches the one in the host's certificate.  Possible values: 0 - (default) Do not validate; 1 - Validate.  Property behavior: - supported if type is set to "HTTP agent" - read-only for inherited objects or discovered objects
 */
enum ItemVerifyHost: int
{
    case DoNotValidate = 0;
    case Validate = 1;
}
