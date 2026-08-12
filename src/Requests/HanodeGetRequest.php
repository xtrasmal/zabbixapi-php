<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hanode.get - Retrieve a list of High availability cluster nodes according to the given parameters. Only available to Super admin user types.
 */
final class HanodeGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'hanode.get';
    }
}
