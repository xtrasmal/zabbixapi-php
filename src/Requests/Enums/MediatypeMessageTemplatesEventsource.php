<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Event source.  Possible values: 0 - Triggers; 1 - Discovery; 2 - Autoregistration; 3 - Internal; 4 - Services.  Property behavior: - required
 */
enum MediatypeMessageTemplatesEventsource: int
{
    case Triggers = 0;
    case Discovery = 1;
    case Autoregistration = 2;
    case Internal = 3;
    case Services = 4;
}
