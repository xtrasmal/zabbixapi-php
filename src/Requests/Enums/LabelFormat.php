<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to enable advanced labels. Possible values: 0 - (default) disable advanced labels; 1 - enable advanced labels.
 */
enum LabelFormat: int
{
    case DisableAdvancedLabels = 0;
    case EnableAdvancedLabels = 1;
}
