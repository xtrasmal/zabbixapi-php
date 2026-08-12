<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * templategroup.massadd - Simultaneously add multiple related objects to all the given template groups.
 */
final class TemplategroupMassaddRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'templategroup.massadd';
    }
}
