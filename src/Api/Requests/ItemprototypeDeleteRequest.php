<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ItemprototypeDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'itemprototype.delete';
    }
}
