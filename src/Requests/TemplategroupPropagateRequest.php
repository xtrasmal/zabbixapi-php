<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * templategroup.propagate - Apply permissions to all of the given template groups' subgroups.
 */
final class TemplategroupPropagateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public array $groups,
        public bool $permissions,
    ) {}

    public static function method(): string
    {
        return 'templategroup.propagate';
    }
}
