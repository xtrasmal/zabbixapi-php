<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * iconmap.get - Retrieve icon maps according to the given parameters.
 */
final class IconmapGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'iconmap.get';
    }
}
