<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * itemprototype.update - Update existing item prototypes.
 */
final class ItemprototypeUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'itemprototype.update';
    }
}
