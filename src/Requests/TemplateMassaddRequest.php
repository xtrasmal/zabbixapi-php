<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * template.massadd - Simultaneously add multiple related objects to the given templates.
 */
final class TemplateMassaddRequest extends AbstractZabbixRequest
{
    public function __construct(
        public array $templates,
        public ?array $groups = null,
        public ?array $macros = null,
        public ?array $templates_link = null,
    ) {}

    public static function method(): string
    {
        return 'template.massadd';
    }
}
