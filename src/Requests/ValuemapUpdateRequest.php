<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * valuemap.update - Update existing value maps.
 */
final class ValuemapUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $valuemapid,
        public ?string $hostid = null,
        public ?string $name = null,
        public ?array $mappings = null,
        public ?string $uuid = null,
    ) {}

    public static function method(): string
    {
        return 'valuemap.update';
    }
}
