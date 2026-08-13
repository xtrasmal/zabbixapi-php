<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * iconmap.update - Update existing icon maps.
 */
final class IconmapUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'iconmap.update';
    }
}
