<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * discoveryrule.update - Update existing LLD rules. The itemid property must be defined for each LLD rule; all other properties are optional and only passed properties will be updated.
 */
final class DiscoveryruleUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $itemid,
        public ?string $delay = null,
        public ?string $hostid = null,
        public ?string $interfaceid = null,
        public ?string $key_ = null,
        public ?string $name = null,
        public ?Enums\DiscoveryruleType $type = null,
        public ?string $url = null,
        public ?Enums\DiscoveryruleAllowTraps $allow_traps = null,
        public ?Enums\DiscoveryruleAuthtype $authtype = null,
        public ?string $description = null,
        public ?Enums\DiscoveryruleFollowRedirects $follow_redirects = null,
        public ?array $headers = null,
        public ?string $http_proxy = null,
        public ?string $ipmi_sensor = null,
        public ?string $jmx_endpoint = null,
        public ?string $lifetime = null,
        public ?Enums\LifetimeType $lifetime_type = null,
        public ?string $enabled_lifetime = null,
        public ?Enums\EnabledLifetimeType $enabled_lifetime_type = null,
        public ?string $master_itemid = null,
        public ?Enums\DiscoveryruleOutputFormat $output_format = null,
        public ?string $params = null,
        public ?array $parameters = null,
        public ?string $password = null,
        public ?Enums\DiscoveryrulePostType $post_type = null,
        public ?string $posts = null,
        public ?string $privatekey = null,
        public ?string $publickey = null,
        public ?array $query_fields = null,
        public ?Enums\DiscoveryruleRequestMethod $request_method = null,
        public ?Enums\DiscoveryruleRetrieveMode $retrieve_mode = null,
        public ?string $snmp_oid = null,
        public ?string $ssl_cert_file = null,
        public ?string $ssl_key_file = null,
        public ?string $ssl_key_password = null,
        public ?Enums\DiscoveryruleStatus $status = null,
        public ?string $status_codes = null,
        public ?string $timeout = null,
        public ?string $trapper_hosts = null,
        public ?string $username = null,
        public ?string $uuid = null,
        public ?Enums\DiscoveryruleVerifyHost $verify_host = null,
        public ?Enums\DiscoveryruleVerifyPeer $verify_peer = null,
        public ?array $filter = null,
        public ?array $preprocessing = null,
        public ?array $lld_macro_paths = null,
        public ?array $overrides = null,
    ) {}

    public function method(): string
    {
        return 'discoveryrule.update';
    }
}
