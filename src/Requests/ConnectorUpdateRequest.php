<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * connector.update - Update existing connectors. Only the connectorid property is required; only passed properties are updated, the rest remain unchanged.
 */
final class ConnectorUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $connectorid,
        public ?string $name = null,
        public ?string $url = null,
        public ?int $protocol = null,
        public ?Enums\DataType $data_type = null,
        public ?int $item_value_type = null,
        public ?int $max_records = null,
        public ?int $max_senders = null,
        public ?int $max_attempts = null,
        public ?string $attempt_interval = null,
        public ?string $timeout = null,
        public ?string $http_proxy = null,
        public ?Enums\ConnectorAuthtype $authtype = null,
        public ?string $username = null,
        public ?string $password = null,
        public ?string $token = null,
        public ?Enums\ConnectorVerifyPeer $verify_peer = null,
        public ?Enums\ConnectorVerifyHost $verify_host = null,
        public ?string $ssl_cert_file = null,
        public ?string $ssl_key_file = null,
        public ?string $ssl_key_password = null,
        public ?string $description = null,
        public ?Enums\ConnectorStatus $status = null,
        public ?Enums\ConnectorTagsEvaltype $tags_evaltype = null,
        public ?array $tags = null,
    ) {}

    public function method(): string
    {
        return 'connector.update';
    }
}
