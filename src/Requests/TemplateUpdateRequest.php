<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * template.update - Update existing templates.
 */
final class TemplateUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $templateid,
        public ?string $host = null,
        public ?string $description = null,
        public ?string $name = null,
        public ?string $uuid = null,
        public ?string $vendor_name = null,
        public ?string $vendor_version = null,
        public ?array $groups = null,
        public ?array $tags = null,
        public ?array $macros = null,
        public ?array $templates = null,
        public ?array $templates_clear = null,
    ) {}

    public static function method(): string
    {
        return 'template.update';
    }
}
