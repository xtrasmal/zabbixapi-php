<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class HttptestDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'httptest.delete';
    }
}
