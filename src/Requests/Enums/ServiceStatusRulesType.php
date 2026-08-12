<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Condition for setting (New status) status. Possible values: 0 - if at least (N) child services have (Status) status or above; 1 - if at least (N%) of child services have (Status) status or above; 2 - if less than (N) child services have (Status) status or below; 3 - if less than (N%) of child services have (Status) status or below; 4 - if weight of child services with (Status) status or above is at least (W); 5 - if weight of child services with (Status) status or above is at least (N%); 6 - if weight of child services with (Status) status or below is less than (W); 7 - if weight of child services with (Status) status or below is less than (N%). Where: N (W) is limit_value; (Status) is limit_status; (New status) is new_status. Required.
 */
enum ServiceStatusRulesType: int
{
    case IfAtLeastNChild = 0;
    case IfAtLeastNOf = 1;
    case IfLessThanNChild = 2;
    case IfLessThanNOf = 3;
    case IfWeightOfChildServices = 4;
    case IfWeightOfChildServices2 = 5;
    case IfWeightOfChildServices3 = 6;
    case IfWeightOfChildServices4 = 7;
}
