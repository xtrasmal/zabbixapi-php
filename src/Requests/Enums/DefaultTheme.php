<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Default theme. Possible values: blue-theme - (default) Blue; dark-theme - Dark; hc-light - High-contrast light; hc-dark - High-contrast dark.
 */
enum DefaultTheme: string
{
    case BlueTheme = 'blue-theme';
    case DarkTheme = 'dark-theme';
    case HcLight = 'hc-light';
    case HcDark = 'hc-dark';
}
