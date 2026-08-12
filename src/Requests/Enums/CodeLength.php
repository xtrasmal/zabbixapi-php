<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Verification code length. Possible values: 6 - 6-digit long; 8 - 8-digit long. Required if type is set to "TOTP".
 */
enum CodeLength: int
{
    case N6DigitLong = 6;
    case N8DigitLong = 8;
}
