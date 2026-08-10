<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * hostinterface.create - Create new host interfaces.
 */
final class HostinterfaceCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $hostid,
        public Enums\HostinterfaceType $type,
        public string $ip,
        public string $dns,
        public string $port,
        public Enums\HostinterfaceUseip $useip,
        public Enums\HostinterfaceMain $main,
        public ?array $details = null,
    ) {}

    public static function method(): string
    {
        return 'hostinterface.create';
    }
}
