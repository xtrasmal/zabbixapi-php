<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ProxyDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'proxy.delete';
    }
}
