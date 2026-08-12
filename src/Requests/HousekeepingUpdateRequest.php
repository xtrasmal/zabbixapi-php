<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * housekeeping.update - Update existing housekeeping settings.
 */
final class HousekeepingUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'housekeeping.update';
    }
}
