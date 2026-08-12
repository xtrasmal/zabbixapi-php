<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class HttptestDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'httptest.delete';
    }
}
