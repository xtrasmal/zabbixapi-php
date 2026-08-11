<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * settings.get - Retrieve the settings object according to the given parameters.
 */
final class SettingsGetRequest extends AbstractZabbixGetRequest
{
    public function __construct(
        public array|string|null $output = null,
    ) {}

    public function method(): string
    {
        return 'settings.get';
    }
}
