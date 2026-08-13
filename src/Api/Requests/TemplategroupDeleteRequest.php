<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class TemplategroupDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'templategroup.delete';
    }
}
