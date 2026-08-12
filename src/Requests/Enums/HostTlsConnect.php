<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Connections to host. Possible values: 1 - (default) No encryption; 2 - PSK; 4 - certificate.
 */
enum HostTlsConnect: int
{
    case NoEncryption = 1;
    case Psk = 2;
    case Certificate = 4;
}
