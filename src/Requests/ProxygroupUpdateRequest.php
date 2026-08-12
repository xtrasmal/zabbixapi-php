<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * proxygroup.update - Update existing proxy groups.
 */
final class ProxygroupUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $proxy_groupid,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $failover_delay = null,
        public ?string $min_online = null,
    ) {}

    public function method(): string
    {
        return 'proxygroup.update';
    }
}
