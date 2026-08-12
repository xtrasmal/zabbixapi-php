<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Status propagation rule. Possible values: 0 - (default) propagate service status as is - without any changes; 1 - increase the propagated status by a given propagation_value (by 1 to 5 severities); 2 - decrease the propagated status by a given propagation_value (by 1 to 5 severities); 3 - ignore this service - the status is not propagated to the parent service at all; 4 - set fixed service status using a given propagation_value. Required if propagation_value is set.
 */
enum PropagationRule: int
{
    case PropagateServiceStatusAsIs = 0;
    case IncreaseThePropagatedStatusBy = 1;
    case DecreaseThePropagatedStatusBy = 2;
    case IgnoreThisServiceTheStatus = 3;
    case SetFixedServiceStatusUsing = 4;
}
