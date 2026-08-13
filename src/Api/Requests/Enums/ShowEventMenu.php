<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Include an entry in the event menu that links to a custom URL. Also adds the urls property to the output of problem.get and event.get.  Possible values: 0 - (default) Do not include event menu entry or urls property; 1 - Include event menu entry and urls property.  Property behavior: - supported if type is set to "Webhook"
 */
enum ShowEventMenu: int
{
    case DoNotIncludeEventMenu = 0;
    case IncludeEventMenuEntryAnd = 1;
}
