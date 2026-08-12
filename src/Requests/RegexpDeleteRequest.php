<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class RegexpDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'regexp.delete';
    }
}
