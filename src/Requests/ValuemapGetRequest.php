<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * valuemap.get - Retrieve value maps according to the given parameters.
 */
final class ValuemapGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'valuemap.get';
    }
}
