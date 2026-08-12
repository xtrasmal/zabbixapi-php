<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * proxy.update - Update existing proxies.
 */
final class ProxyUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $proxyid,
        public ?string $name = null,
        public ?string $proxy_groupid = null,
        public ?string $local_address = null,
        public ?string $local_port = null,
        public ?Enums\OperatingMode $operating_mode = null,
        public ?string $description = null,
        public ?string $address = null,
        public ?string $port = null,
        public ?string $allowed_addresses = null,
        public ?Enums\ProxyTlsConnect $tls_connect = null,
        public ?int $tls_accept = null,
        public ?string $tls_issuer = null,
        public ?string $tls_subject = null,
        public ?string $tls_psk_identity = null,
        public ?string $tls_psk = null,
        public ?Enums\CustomTimeouts $custom_timeouts = null,
        public ?string $timeout_zabbix_agent = null,
        public ?string $timeout_simple_check = null,
        public ?string $timeout_snmp_agent = null,
        public ?string $timeout_external_check = null,
        public ?string $timeout_db_monitor = null,
        public ?string $timeout_http_agent = null,
        public ?string $timeout_ssh_agent = null,
        public ?string $timeout_telnet_agent = null,
        public ?string $timeout_script = null,
        public ?string $timeout_browser = null,
        public ?array $hosts = null,
    ) {}

    public function method(): string
    {
        return 'proxy.update';
    }
}
