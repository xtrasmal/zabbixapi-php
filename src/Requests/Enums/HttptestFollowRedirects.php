<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to follow HTTP redirects. Possible values: 0 - don't follow redirects; 1 - (default) follow redirects.
 */
enum HttptestFollowRedirects: int
{
    case DonTFollowRedirects = 0;
    case FollowRedirects = 1;
}
