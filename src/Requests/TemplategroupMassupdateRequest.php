<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * templategroup.massupdate - Replace templates with the specified ones in multiple template groups. All other templates, except the ones mentioned, will be excluded from the given template groups.
 */
final class TemplategroupMassupdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public array $groups,
        public array $templates,
    ) {}

    public function method(): string
    {
        return 'templategroup.massupdate';
    }
}
