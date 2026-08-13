<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ItemDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'item.delete';
    }
}
