<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class HttptestDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'httptest.delete';
    }
}
