<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * drule.update - Update existing network discovery rules.
 */
final class DruleUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'drule.update';
    }
}
