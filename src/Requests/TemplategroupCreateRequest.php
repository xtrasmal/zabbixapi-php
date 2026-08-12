<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * templategroup.create - Create new template groups.
 */
final class TemplategroupCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'templategroup.create';
    }
}
