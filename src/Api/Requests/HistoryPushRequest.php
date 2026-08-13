<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class HistoryPushRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'history.push';
    }
}
