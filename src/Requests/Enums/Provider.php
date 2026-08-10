<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Email provider.  Possible values: 0 - (default) Generic SMTP; 1 - Gmail; 2 - Gmail relay; 3 - Office365; 4 - Office365 relay.
 */
enum Provider: int
{
    case GenericSmtp = 0;
    case Gmail = 1;
    case GmailRelay = 2;
    case Office365 = 3;
    case Office365Relay = 4;
}
