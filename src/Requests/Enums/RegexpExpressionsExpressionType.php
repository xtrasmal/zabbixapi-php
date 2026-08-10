<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Type of Regular expression. Required. Possible values: 0 - Character string included; 1 - Any character string included; 2 - Character string not included; 3 - Result is TRUE; 4 - Result is FALSE.
 */
enum RegexpExpressionsExpressionType: int
{
    case CharacterStringIncluded = 0;
    case AnyCharacterStringIncluded = 1;
    case CharacterStringNotIncluded = 2;
    case ResultIsTrue = 3;
    case ResultIsFalse = 4;
}
