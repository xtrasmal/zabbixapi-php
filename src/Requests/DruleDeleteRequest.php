<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class DruleDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'drule.delete';
    }
}
