<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostprototype.create - Create new host prototypes.
 */
final class HostprototypeCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $host,
        public string $ruleid,
        public array $groupLinks,
        public ?string $name = null,
        public ?Enums\HostprototypeStatus $status = null,
        public ?Enums\HostprototypeInventoryMode $inventory_mode = null,
        public ?Enums\HostprototypeDiscover $discover = null,
        public ?Enums\CustomInterfaces $custom_interfaces = null,
        public ?string $uuid = null,
        public ?array $groupPrototypes = null,
        public ?array $macros = null,
        public ?array $tags = null,
        public ?array $interfaces = null,
        public ?array $templates = null,
    ) {}

    public function method(): string
    {
        return 'hostprototype.create';
    }
}
