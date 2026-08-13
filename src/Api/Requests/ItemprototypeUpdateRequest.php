<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * itemprototype.update - Update existing item prototypes.
 */
final class ItemprototypeUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'itemprototype.update';
    }
}
