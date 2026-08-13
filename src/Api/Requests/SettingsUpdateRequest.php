<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * settings.update - Update existing common (system) settings.
 */
final class SettingsUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'settings.update';
    }
}
