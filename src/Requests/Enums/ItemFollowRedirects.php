<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Follow response redirects while polling data.  Possible values: 0 - Do not follow redirects; 1 - (default) Follow redirects.  Property behavior: - supported if type is set to "HTTP agent" - read-only for inherited objects or discovered objects
 */
enum ItemFollowRedirects: int
{
    case DoNotFollowRedirects = 0;
    case FollowRedirects = 1;
}
