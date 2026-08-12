<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Show technical errors (PHP/SQL) to non-Super admin users and to users that are not part of user groups with debug mode enabled. Possible values: 0 - (default) Do not show technical errors; 1 - Show technical errors.
 */
enum ShowTechnicalErrors: int
{
    case DoNotShowTechnicalErrors = 0;
    case ShowTechnicalErrors = 1;
}
