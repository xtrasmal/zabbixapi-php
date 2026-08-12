<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Expression delimiter. Supported if expression_type is set to "Any character string included". Default: ",".
 */
enum RegexpExpressionsExpDelimiter: string
{
    case V0 = ',';
    case V1 = '.';
    case V2 = '/';
}
