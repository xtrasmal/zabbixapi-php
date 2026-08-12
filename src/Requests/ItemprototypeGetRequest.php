<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * itemprototype.get - Retrieve item prototypes according to the given parameters.
 */
final class ItemprototypeGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'itemprototype.get';
    }
}
