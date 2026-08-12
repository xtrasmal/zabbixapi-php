<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * discoveryrule.get - Retrieve LLD rules according to the given parameters.
 */
final class DiscoveryruleGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'discoveryrule.get';
    }
}
