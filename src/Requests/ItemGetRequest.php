<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * item.get - Retrieve items according to the given parameters.
 */
final class ItemGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'item.get';
    }
}
