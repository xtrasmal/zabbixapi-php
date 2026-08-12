<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * templategroup.update - Update existing template groups.
 */
final class TemplategroupUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'templategroup.update';
    }
}
