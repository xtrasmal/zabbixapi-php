<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class TriggerprototypeDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'triggerprototype.delete';
    }
}
