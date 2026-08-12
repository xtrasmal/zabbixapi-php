<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Type of allowed incoming connections for autoregistration. Possible values: 1 - allow unencrypted connections; 2 - allow TLS with PSK; 3 - allow both unencrypted and TLS with PSK connections.
 */
enum TlsAccept: int
{
    case AllowUnencryptedConnections = 1;
    case AllowTlsWithPsk = 2;
    case AllowBothUnencryptedAndTls = 3;
}
