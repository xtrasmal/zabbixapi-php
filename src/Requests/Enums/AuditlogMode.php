<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether to enable audit logging of low-level discovery, network discovery and autoregistration activities performed by the server (System user). Possible values: 0 - Disable; 1 - (default) Enable.
 */
enum AuditlogMode: int
{
    case Disable = 0;
    case Enable = 1;
}
