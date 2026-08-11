<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * httptest.update - Update existing web scenarios.
 */
final class HttptestUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $httptestid,
        public ?string $hostid = null,
        public ?string $name = null,
        public ?string $agent = null,
        public ?Enums\Authentication $authentication = null,
        public ?string $delay = null,
        public ?array $headers = null,
        public ?string $http_password = null,
        public ?string $http_proxy = null,
        public ?string $http_user = null,
        public ?int $retries = null,
        public ?string $ssl_cert_file = null,
        public ?string $ssl_key_file = null,
        public ?string $ssl_key_password = null,
        public ?Enums\HttptestStatus $status = null,
        public ?array $variables = null,
        public ?Enums\HttptestVerifyHost $verify_host = null,
        public ?Enums\HttptestVerifyPeer $verify_peer = null,
        public ?string $uuid = null,
        public ?array $steps = null,
        public ?array $tags = null,
    ) {}

    public function method(): string
    {
        return 'httptest.update';
    }
}
