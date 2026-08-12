<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * itemprototype.create - Create new item prototypes.
 */
final class ItemprototypeCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'itemprototype.create';
    }
}
