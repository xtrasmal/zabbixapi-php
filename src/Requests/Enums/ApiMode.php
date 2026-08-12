<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Mode for treating API methods listed in the api property. Possible values: 0 - (default) deny list; 1 - allow list.
 */
enum ApiMode: int
{
    case DenyList = 0;
    case AllowList = 1;
}
