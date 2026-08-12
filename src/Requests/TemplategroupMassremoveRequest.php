<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * templategroup.massremove - Remove related objects from multiple template groups.
 */
final class TemplategroupMassremoveRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array $groupids,
        public string|array $templateids,
    ) {}

    public function method(): string
    {
        return 'templategroup.massremove';
    }
}
