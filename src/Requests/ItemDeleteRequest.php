<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ItemDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'item.delete';
    }
}
