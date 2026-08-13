<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * item.create - Create new items. Web items cannot be created via the Zabbix API.
 */
final class ItemCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'item.create';
    }
}
