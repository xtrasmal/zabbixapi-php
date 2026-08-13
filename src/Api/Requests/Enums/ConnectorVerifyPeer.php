<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Whether to validate that the host's certificate is authentic. Possible values: 0 - Do not validate; 1 - (default) Validate.
 */
enum ConnectorVerifyPeer: int
{
    case DoNotValidate = 0;
    case Validate = 1;
}
