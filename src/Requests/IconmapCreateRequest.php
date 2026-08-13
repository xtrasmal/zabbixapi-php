<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * iconmap.create - Create new icon maps.
 */
final class IconmapCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'iconmap.create';
    }
}
