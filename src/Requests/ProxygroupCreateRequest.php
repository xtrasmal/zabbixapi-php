<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * proxygroup.create - Create new proxy groups.
 */
final class ProxygroupCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'proxygroup.create';
    }
}
