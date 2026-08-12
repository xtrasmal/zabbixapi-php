<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * discoveryrule.update - Update existing LLD rules. The itemid property must be defined for each LLD rule; all other properties are optional and only passed properties will be updated.
 */
final class DiscoveryruleUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'discoveryrule.update';
    }
}
