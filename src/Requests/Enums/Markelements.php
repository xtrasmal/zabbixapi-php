<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to highlight map elements that have recently changed their status. Possible values: 0 - (default) do not highlight elements; 1 - highlight elements.
 */
enum Markelements: int
{
    case DoNotHighlightElements = 0;
    case HighlightElements = 1;
}
