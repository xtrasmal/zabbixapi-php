<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * templategroup.massremove - Remove related objects from multiple template groups.
 */
final class TemplategroupMassremoveRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'templategroup.massremove';
    }
}
