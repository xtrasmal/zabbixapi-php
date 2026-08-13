<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * templategroup.update - Update existing template groups.
 */
final class TemplategroupUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'templategroup.update';
    }
}
