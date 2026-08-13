<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class SlaDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'sla.delete';
    }
}
