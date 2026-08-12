<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to validate that the host's certificate is authentic. Possible values: 0 - (default) Do not validate; 1 - Validate. Property behavior: supported if type is set to "HTTP agent"; read-only for inherited objects.
 */
enum DiscoveryruleVerifyPeer: int
{
    case DoNotValidate = 0;
    case Validate = 1;
}
