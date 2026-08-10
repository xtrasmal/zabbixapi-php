<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Deprecated. Please use message_format instead. Message format.  Possible values: 0 - Plain text; 1 - (default) HTML.  Property behavior: - supported if type is set to "Email"
 */
enum ContentType: int
{
    case PlainText = 0;
    case Html = 1;
}
