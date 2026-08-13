<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * housekeeping.update - Update existing housekeeping settings.
 */
final class HousekeepingUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'housekeeping.update';
    }
}
