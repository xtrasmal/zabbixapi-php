<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Type of the task. Possible values: 1 - Diagnostic information; 2 - Refresh proxy configuration; 6 - Execute now. Since Zabbix 7.0.19, Admin and User type users may create 'Execute now' tasks. Property behavior: required.
 */
enum TaskType: int
{
    case DiagnosticInformation = 1;
    case RefreshProxyConfiguration = 2;
    case ExecuteNow = 6;
}
