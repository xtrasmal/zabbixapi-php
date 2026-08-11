<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * templategroup.massadd - Simultaneously add multiple related objects to all the given template groups.
 */
final class TemplategroupMassaddRequest extends AbstractZabbixRequest
{
    public function __construct(
        public array $groups,
        public array $templates,
    ) {}

    public function method(): string
    {
        return 'templategroup.massadd';
    }
}
