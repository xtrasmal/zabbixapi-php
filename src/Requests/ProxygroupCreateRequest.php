<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * proxygroup.create - Create new proxy groups.
 */
final class ProxygroupCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public ?string $description = null,
        public ?string $failover_delay = null,
        public ?string $min_online = null,
    ) {}

    public function method(): string
    {
        return 'proxygroup.create';
    }
}
