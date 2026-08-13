<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * valuemap.update - Update existing value maps.
 */
final class ValuemapUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'valuemap.update';
    }
}
