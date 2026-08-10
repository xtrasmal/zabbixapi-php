<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * template.massupdate - Simultaneously replace or remove related objects and update properties on multiple templates.
 */
final class TemplateMassupdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public array $templates,
        public ?array $groups = null,
        public ?array $macros = null,
        public ?array $templates_clear = null,
        public ?array $templates_link = null,
    ) {}

    public static function method(): string
    {
        return 'template.massupdate';
    }
}
