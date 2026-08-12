<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ProxyDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'proxy.delete';
    }
}
