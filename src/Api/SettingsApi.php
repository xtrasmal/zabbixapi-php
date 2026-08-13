<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\SettingsGetRequest;
use Idiot\Zabbix\Requests\SettingsUpdateRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

final class SettingsApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(SettingsGetRequest|array $request = []): ZabbixRequest
    {
        return $this->request(SettingsGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(SettingsUpdateRequest|array $request): ZabbixRequest
    {
        return $this->request(SettingsUpdateRequest::class, $request);
    }
}
