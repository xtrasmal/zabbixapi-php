<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * templategroup.create - Create new template groups.
 */
final class TemplategroupCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'templategroup.create';
    }
}
