<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * settings.get - Retrieve the settings object according to the given parameters.
 */
final class SettingsGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'settings.get';
    }
}
