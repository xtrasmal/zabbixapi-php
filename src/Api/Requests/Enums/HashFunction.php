<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Type of the hash function for generating TOTP codes. Possible values: 1 - SHA-1; 2 - SHA-256; 3 - SHA-512. Required if type is set to "TOTP".
 */
enum HashFunction: int
{
    case Sha1 = 1;
    case Sha256 = 2;
    case Sha512 = 3;
}
