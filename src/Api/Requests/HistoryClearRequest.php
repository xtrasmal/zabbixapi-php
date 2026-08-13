<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class HistoryClearRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'history.clear';
    }
}
