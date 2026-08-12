<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Type of macro. Possible values: 0 - (default) Text macro; 1 - Secret macro; 2 - Vault secret.
 */
enum UsermacroType: int
{
    case TextMacro = 0;
    case SecretMacro = 1;
    case VaultSecret = 2;
}
