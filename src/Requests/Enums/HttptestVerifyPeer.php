<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to validate that the host's certificate is authentic. Possible values: 0 - (default) skip peer verification; 1 - verify peer.
 */
enum HttptestVerifyPeer: int
{
    case SkipPeerVerification = 0;
    case VerifyPeer = 1;
}
