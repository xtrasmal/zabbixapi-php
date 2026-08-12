<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * hostinterface.update - Update existing host interfaces.
 */
final class HostinterfaceUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $interfaceid,
        public ?string $hostid = null,
        public ?Enums\HostinterfaceType $type = null,
        public ?string $ip = null,
        public ?string $dns = null,
        public ?string $port = null,
        public ?Enums\HostinterfaceUseip $useip = null,
        public ?Enums\HostinterfaceMain $main = null,
        public ?array $details = null,
    ) {}

    public function method(): string
    {
        return 'hostinterface.update';
    }
}
