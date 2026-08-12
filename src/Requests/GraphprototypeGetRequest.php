<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * graphprototype.get - Retrieve graph prototypes according to the given parameters.
 */
final class GraphprototypeGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'graphprototype.get';
    }
}
