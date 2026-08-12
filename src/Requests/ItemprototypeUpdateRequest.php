<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * itemprototype.update - Update existing item prototypes.
 */
final class ItemprototypeUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $itemid,
        public ?string $delay = null,
        public ?string $hostid = null,
        public ?string $interfaceid = null,
        public ?string $key_ = null,
        public ?string $name = null,
        public ?Enums\ItemprototypeType $type = null,
        public ?string $url = null,
        public ?Enums\ItemprototypeValueType $value_type = null,
        public ?Enums\ItemprototypeAllowTraps $allow_traps = null,
        public ?Enums\ItemprototypeAuthtype $authtype = null,
        public ?string $description = null,
        public ?Enums\ItemprototypeFollowRedirects $follow_redirects = null,
        public ?array $headers = null,
        public ?string $history = null,
        public ?string $http_proxy = null,
        public ?string $ipmi_sensor = null,
        public ?string $jmx_endpoint = null,
        public ?string $logtimefmt = null,
        public ?string $master_itemid = null,
        public ?Enums\ItemprototypeOutputFormat $output_format = null,
        public ?string $params = null,
        public ?array $parameters = null,
        public ?string $password = null,
        public ?Enums\ItemprototypePostType $post_type = null,
        public ?string $posts = null,
        public ?string $privatekey = null,
        public ?string $publickey = null,
        public ?array $query_fields = null,
        public ?Enums\ItemprototypeRequestMethod $request_method = null,
        public ?Enums\ItemprototypeRetrieveMode $retrieve_mode = null,
        public ?string $snmp_oid = null,
        public ?string $ssl_cert_file = null,
        public ?string $ssl_key_file = null,
        public ?string $ssl_key_password = null,
        public ?Enums\ItemprototypeStatus $status = null,
        public ?string $status_codes = null,
        public ?string $timeout = null,
        public ?string $trapper_hosts = null,
        public ?string $trends = null,
        public ?string $units = null,
        public ?string $username = null,
        public ?string $uuid = null,
        public ?string $valuemapid = null,
        public ?Enums\ItemprototypeVerifyHost $verify_host = null,
        public ?Enums\ItemprototypeVerifyPeer $verify_peer = null,
        public ?Enums\ItemprototypeDiscover $discover = null,
        public ?array $preprocessing = null,
        public ?array $tags = null,
    ) {}

    public function method(): string
    {
        return 'itemprototype.update';
    }
}
