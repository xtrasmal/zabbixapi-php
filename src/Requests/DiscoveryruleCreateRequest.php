<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * discoveryrule.create - Create new LLD rules.
 */
final class DiscoveryruleCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'discoveryrule.create';
    }
}
