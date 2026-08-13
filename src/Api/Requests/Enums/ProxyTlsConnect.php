<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Connections to proxy. Possible values: 1 - (default) No encryption; 2 - PSK; 4 - certificate.
 */
enum ProxyTlsConnect: int
{
    case NoEncryption = 1;
    case Psk = 2;
    case Certificate = 4;
}
