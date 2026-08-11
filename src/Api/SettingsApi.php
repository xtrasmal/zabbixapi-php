<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\SettingsGetRequest;
use IntelliTrend\Zabbix\Requests\SettingsUpdateRequest;

final class SettingsApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(SettingsGetRequest|array $request = []): SettingsGetRequest
    {
        return $this->request(SettingsGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(SettingsUpdateRequest|array $request): SettingsUpdateRequest
    {
        return $this->request(SettingsUpdateRequest::class, $request);
    }
}
