<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * templategroup.create - Create new template groups.
 */
final class TemplategroupCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public ?string $uuid = null,
    ) {}

    public static function method(): string
    {
        return 'templategroup.create';
    }
}
