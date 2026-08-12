<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Follow response redirects while polling data. Possible values: 0 - Do not follow redirects; 1 - (default) Follow redirects. Property behavior: supported if type is set to "HTTP agent"; read-only for inherited objects.
 */
enum DiscoveryruleFollowRedirects: int
{
    case DoNotFollowRedirects = 0;
    case FollowRedirects = 1;
}
