<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * HTTP authentication method. Possible values: 0 - (default) None; 1 - Basic; 2 - NTLM; 3 - Kerberos; 4 - Digest; 5 - Bearer.
 */
enum ConnectorAuthtype: int
{
    case None = 0;
    case Basic = 1;
    case Ntlm = 2;
    case Kerberos = 3;
    case Digest = 4;
    case Bearer = 5;
}
