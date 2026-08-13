<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * valuemap.create - Create new value maps.
 */
final class ValuemapCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'valuemap.create';
    }
}
