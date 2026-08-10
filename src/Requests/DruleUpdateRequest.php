<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * drule.update - Update existing network discovery rules.
 */
final class DruleUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $druleid,
        public ?string $iprange = null,
        public ?string $name = null,
        public ?string $delay = null,
        public ?string $proxyid = null,
        public ?Enums\DruleStatus $status = null,
        public ?int $concurrency_max = null,
        public ?array $dchecks = null,
    ) {}

    public static function method(): string
    {
        return 'drule.update';
    }
}
