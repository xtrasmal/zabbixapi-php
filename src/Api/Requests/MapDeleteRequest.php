<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class MapDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'map.delete';
    }
}
