<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Tag evaluation method. Possible values: 0 - (default) And/Or; 2 - Or.
 */
enum ConnectorTagsEvaltype: int
{
    case AndOr = 0;
    case Or = 2;
}
