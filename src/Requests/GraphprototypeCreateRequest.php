<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * graphprototype.create - Create new graph prototypes.
 */
final class GraphprototypeCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'graphprototype.create';
    }
}
