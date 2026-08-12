<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class IconmapDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'iconmap.delete';
    }
}
