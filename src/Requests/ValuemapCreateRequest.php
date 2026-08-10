<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * valuemap.create - Create new value maps.
 */
final class ValuemapCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $hostid,
        public string $name,
        public array $mappings,
        public ?string $uuid = null,
    ) {}

    public static function method(): string
    {
        return 'valuemap.create';
    }
}
