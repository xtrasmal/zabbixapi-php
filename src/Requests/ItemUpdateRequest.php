<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * item.update - Update existing items. The itemid property must be defined for each item; all other properties are optional. Web items cannot be updated via the Zabbix API.
 */
final class ItemUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'item.update';
    }
}
