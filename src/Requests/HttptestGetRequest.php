<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * httptest.get - Retrieve web scenarios according to the given parameters.
 */
final class HttptestGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'httptest.get';
    }
}
