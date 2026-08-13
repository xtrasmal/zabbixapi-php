<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * httptest.create - Create new web scenarios.
 */
final class HttptestCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'httptest.create';
    }
}
