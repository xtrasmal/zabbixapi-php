<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * templategroup.propagate - Apply permissions to all of the given template groups' subgroups.
 */
final class TemplategroupPropagateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'templategroup.propagate';
    }
}
