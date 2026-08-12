<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * item.create - Create new items. Web items cannot be created via the Zabbix API.
 */
final class ItemCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $hostid,
        public string $key_,
        public string $name,
        public Enums\ItemType $type,
        public Enums\ItemValueType $value_type,
        public ?string $delay = null,
        public ?string $interfaceid = null,
        public ?string $url = null,
        public ?Enums\ItemAllowTraps $allow_traps = null,
        public ?Enums\ItemAuthtype $authtype = null,
        public ?string $description = null,
        public ?Enums\ItemFollowRedirects $follow_redirects = null,
        public ?array $headers = null,
        public ?string $history = null,
        public ?string $http_proxy = null,
        public ?int $inventory_link = null,
        public ?string $ipmi_sensor = null,
        public ?string $jmx_endpoint = null,
        public ?string $logtimefmt = null,
        public ?string $master_itemid = null,
        public ?Enums\ItemOutputFormat $output_format = null,
        public ?string $params = null,
        public ?array $parameters = null,
        public ?string $password = null,
        public ?Enums\ItemPostType $post_type = null,
        public ?string $posts = null,
        public ?string $privatekey = null,
        public ?string $publickey = null,
        public ?array $query_fields = null,
        public ?Enums\ItemRequestMethod $request_method = null,
        public ?Enums\ItemRetrieveMode $retrieve_mode = null,
        public ?string $snmp_oid = null,
        public ?string $ssl_cert_file = null,
        public ?string $ssl_key_file = null,
        public ?string $ssl_key_password = null,
        public ?Enums\ItemStatus $status = null,
        public ?string $status_codes = null,
        public ?string $timeout = null,
        public ?string $trapper_hosts = null,
        public ?string $trends = null,
        public ?string $units = null,
        public ?string $username = null,
        public ?string $uuid = null,
        public ?string $valuemapid = null,
        public ?Enums\ItemVerifyHost $verify_host = null,
        public ?Enums\ItemVerifyPeer $verify_peer = null,
        public ?array $preprocessing = null,
        public ?array $tags = null,
    ) {}

    public function method(): string
    {
        return 'item.create';
    }
}
