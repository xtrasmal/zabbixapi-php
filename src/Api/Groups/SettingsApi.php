<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Request;
use Idiot\Zabbix\Requests\SettingsGetRequest;
use Idiot\Zabbix\Requests\SettingsUpdateRequest;

final class SettingsApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(SettingsGetRequest|array $request = []): Request
    {
        return $this->request(SettingsGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(SettingsUpdateRequest|array $request): Request
    {
        return $this->request(SettingsUpdateRequest::class, $request);
    }
}
