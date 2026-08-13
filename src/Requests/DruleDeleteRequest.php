<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class DruleDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'drule.delete';
    }
}
