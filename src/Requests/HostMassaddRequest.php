<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * host.massadd - Simultaneously add multiple related objects to all the given hosts.
 */
final class HostMassaddRequest extends AbstractZabbixRequest
{
    public function __construct(
        public array $hosts,
        public ?array $groups = null,
        public ?array $interfaces = null,
        public ?array $macros = null,
        public ?array $templates = null,
    ) {}

    public static function method(): string
    {
        return 'host.massadd';
    }
}
