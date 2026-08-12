<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * httptest.create - Create new web scenarios.
 */
final class HttptestCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'httptest.create';
    }
}
