<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Status calculation rule. Only applicable if child services exist. Possible values: 0 - set status to OK; 1 - most critical if all children have problems; 2 - most critical of child services.
 */
enum ServiceAlgorithm: int
{
    case SetStatusToOk = 0;
    case MostCriticalIfAllChildren = 1;
    case MostCriticalOfChildServices = 2;
}
