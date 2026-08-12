<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Determines the type of user input expected. Supported if manualinput is set to "Enabled". Possible values: 0 - (default) String (manualinput_validator is treated as a regular expression); 1 - List (manualinput_validator is treated as a comma-separated list of possible input values).
 */
enum ManualinputValidatorType: int
{
    case StringManualinputValidatorIsTreated = 0;
    case ListManualinputValidatorIsTreated = 1;
}
