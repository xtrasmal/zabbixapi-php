<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * What part of response should be stored. Possible values if request_method is set to "GET", "POST", or "PUT": 0 - (default) Body; 1 - Headers; 2 - Both body and headers will be stored. Possible values if request_method is set to "HEAD": 1 - Headers. Property behavior: supported if type is set to "HTTP agent"; read-only for inherited objects.
 */
enum DiscoveryruleRetrieveMode: int
{
    case Body = 0;
    case Headers = 1;
    case BothBodyAndHeadersWill = 2;
}
