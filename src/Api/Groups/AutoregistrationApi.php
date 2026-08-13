<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\AutoregistrationGetRequest;
use Idiot\Zabbix\Api\Requests\AutoregistrationUpdateRequest;
use Idiot\Zabbix\Request;

final class AutoregistrationApi extends AbstractApi
{
    /** @param array<string, mixed> $request */
    public function get(AutoregistrationGetRequest|array $request = []): Request
    {
        return $this->request(AutoregistrationGetRequest::class, $request);
    }

    /** @param array<string, mixed> $request */
    public function update(AutoregistrationUpdateRequest|array $request): Request
    {
        return $this->request(AutoregistrationUpdateRequest::class, $request);
    }
}
