<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Part of the HTTP response that the scenario step must retrieve. Possible values: 0 - (default) only body; 1 - only headers; 2 - headers and body.
 */
enum HttptestRetrieveMode: int
{
    case OnlyBody = 0;
    case OnlyHeaders = 1;
    case HeadersAndBody = 2;
}
