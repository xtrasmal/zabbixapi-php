<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether the media type is enabled.  Possible values: 0 - (default) Enabled; 1 - Disabled.
 */
enum MediatypeStatus: int
{
    case Enabled = 0;
    case Disabled = 1;
}
