<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * graphprototype.update - Update existing graph prototypes.
 */
final class GraphprototypeUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'graphprototype.update';
    }
}
