<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Transport used by the media type.  Possible values: 0 - Email; 1 - Script; 2 - SMS; 4 - Webhook.
 */
enum MediatypeType: int
{
    case Email = 0;
    case Script = 1;
    case Sms = 2;
    case Webhook = 4;
}
