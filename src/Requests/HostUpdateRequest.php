<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * host.update - Update existing hosts.
 */
final class HostUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $hostid,
        public ?string $host = null,
        public ?string $description = null,
        public ?Enums\HostInventoryMode $inventory_mode = null,
        public ?Enums\IpmiAuthtype $ipmi_authtype = null,
        public ?string $ipmi_password = null,
        public ?Enums\IpmiPrivilege $ipmi_privilege = null,
        public ?string $ipmi_username = null,
        public ?string $name = null,
        public ?Enums\MonitoredBy $monitored_by = null,
        public ?string $proxyid = null,
        public ?string $proxy_groupid = null,
        public ?Enums\HostStatus $status = null,
        public ?Enums\HostTlsConnect $tls_connect = null,
        public ?int $tls_accept = null,
        public ?string $tls_issuer = null,
        public ?string $tls_subject = null,
        public ?string $tls_psk_identity = null,
        public ?string $tls_psk = null,
        public ?array $groups = null,
        public ?array $interfaces = null,
        public ?array $tags = null,
        public ?array $inventory = null,
        public ?array $macros = null,
        public ?array $templates = null,
        public ?array $templates_clear = null,
    ) {}

    public function method(): string
    {
        return 'host.update';
    }
}
