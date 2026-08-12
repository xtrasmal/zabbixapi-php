<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Validate URI schemes. Possible values: 0 - Do not validate; 1 - (default) Validate.
 */
enum ValidateUriSchemes: int
{
    case DoNotValidate = 0;
    case Validate = 1;
}
