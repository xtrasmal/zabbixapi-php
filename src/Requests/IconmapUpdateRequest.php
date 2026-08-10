<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * iconmap.update - Update existing icon maps.
 */
final class IconmapUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $iconmapid,
        public ?string $name = null,
        public ?string $default_iconid = null,
        public ?array $mappings = null,
    ) {}

    public static function method(): string
    {
        return 'iconmap.update';
    }
}
