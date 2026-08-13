<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Graph prototype discovery status. Possible values: 0 - (default) new graphs will be discovered; 1 - new graphs will not be discovered and existing graphs will be marked as lost.
 */
enum GraphprototypeDiscover: int
{
    case NewGraphsWillBeDiscovered = 0;
    case NewGraphsWillNotBe = 1;
}
