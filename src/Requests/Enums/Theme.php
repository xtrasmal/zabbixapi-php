<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * User's theme. Possible values: default - (default) system default; blue-theme - Blue; dark-theme - Dark; hc-light - High-contrast light; hc-dark - High-contrast dark.
 */
enum Theme: string
{
    case Default = 'default';
    case BlueTheme = 'blue-theme';
    case DarkTheme = 'dark-theme';
    case HcLight = 'hc-light';
    case HcDark = 'hc-dark';
}
