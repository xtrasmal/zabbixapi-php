<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class HistoryClearRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'history.clear';
    }
}
