<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ProxygroupDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'proxygroup.delete';
    }
}
