<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class MediatypeDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'mediatype.delete';
    }
}
