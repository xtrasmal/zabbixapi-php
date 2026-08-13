<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ValuemapDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'valuemap.delete';
    }
}
