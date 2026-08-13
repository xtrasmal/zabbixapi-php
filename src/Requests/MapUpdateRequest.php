<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * map.update - Update existing maps.
 */
final class MapUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'map.update';
    }
}
