<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * How problems should be displayed. Possible values: 0 - (default) display the count of all problems; 1 - display only the count of unacknowledged problems; 2 - display the count of acknowledged and unacknowledged problems separately.
 */
enum ShowUnack: int
{
    case DisplayTheCountOfAll = 0;
    case DisplayOnlyTheCountOf = 1;
    case DisplayTheCountOfAcknowledged = 2;
}
