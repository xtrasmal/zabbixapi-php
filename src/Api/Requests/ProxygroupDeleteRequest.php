<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ProxygroupDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'proxygroup.delete';
    }
}
