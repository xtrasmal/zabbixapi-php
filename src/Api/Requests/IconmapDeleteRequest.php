<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class IconmapDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'iconmap.delete';
    }
}
