<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether icon highlighting is enabled. Possible values: 0 - highlighting disabled; 1 - (default) highlighting enabled.
 */
enum Highlight: int
{
    case HighlightingDisabled = 0;
    case HighlightingEnabled = 1;
}
