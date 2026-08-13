<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Vault provider. Possible values: 0 - (default) HashiCorp Vault; 1 - CyberArk Vault.
 */
enum VaultProvider: int
{
    case HashicorpVault = 0;
    case CyberarkVault = 1;
}
