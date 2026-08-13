<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * graphprototype.create - Create new graph prototypes.
 */
final class GraphprototypeCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'graphprototype.create';
    }
}
