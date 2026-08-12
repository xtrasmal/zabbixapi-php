<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * httptest.update - Update existing web scenarios.
 */
final class HttptestUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'httptest.update';
    }
}
