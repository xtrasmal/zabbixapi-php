<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * templategroup.massadd - Simultaneously add multiple related objects to all the given template groups.
 */
final class TemplategroupMassaddRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'templategroup.massadd';
    }
}
