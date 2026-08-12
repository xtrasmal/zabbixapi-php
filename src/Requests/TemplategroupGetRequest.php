<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * templategroup.get - Retrieve template groups according to the given parameters.
 */
final class TemplategroupGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'templategroup.get';
    }
}
