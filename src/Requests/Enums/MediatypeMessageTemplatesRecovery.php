<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Operation mode.  Possible values: 0 - Operations; 1 - Recovery operations; 2 - Update operations.  Property behavior: - required
 */
enum MediatypeMessageTemplatesRecovery: int
{
    case Operations = 0;
    case RecoveryOperations = 1;
    case UpdateOperations = 2;
}
