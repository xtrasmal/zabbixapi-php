<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * templategroup.update - Update existing template groups.
 */
final class TemplategroupUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $groupid,
        public ?string $name = null,
        public ?string $uuid = null,
    ) {}

    public function method(): string
    {
        return 'templategroup.update';
    }
}
