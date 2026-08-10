<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Type of the MFA method. Possible values: 1 - TOTP (Time-based One-Time Passwords); 2 - Duo Universal Prompt.
 */
enum MfaType: int
{
    case TotpTimeBasedOneTime = 1;
    case DuoUniversalPrompt = 2;
}
