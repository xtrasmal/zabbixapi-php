<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class MediatypeDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'mediatype.delete';
    }
}
