<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * drule.create - Create new network discovery rules.
 */
final class DruleCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public string $iprange,
        public array $dchecks,
        public ?string $delay = null,
        public ?string $proxyid = null,
        public ?Enums\DruleStatus $status = null,
        public ?int $concurrency_max = null,
    ) {}

    public static function method(): string
    {
        return 'drule.create';
    }
}
