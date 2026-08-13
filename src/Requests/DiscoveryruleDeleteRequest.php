<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class DiscoveryruleDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'discoveryrule.delete';
    }
}
