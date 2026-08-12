<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * template.massremove - Remove related objects from multiple templates.
 */
final class TemplateMassremoveRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array $templateids,
        public string|array|null $groupids = null,
        public string|array|null $macros = null,
        public string|array|null $templateids_clear = null,
        public string|array|null $templateids_link = null,
    ) {}

    public function method(): string
    {
        return 'template.massremove';
    }
}
