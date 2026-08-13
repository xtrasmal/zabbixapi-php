<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

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
