<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ItemprototypeDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'itemprototype.delete';
    }
}
