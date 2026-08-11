<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * template.create - Create new templates.
 */
final class TemplateCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $host,
        public array $groups,
        public ?string $description = null,
        public ?string $name = null,
        public ?string $uuid = null,
        public ?string $vendor_name = null,
        public ?string $vendor_version = null,
        public ?array $tags = null,
        public ?array $templates = null,
        public ?array $macros = null,
    ) {}

    public function method(): string
    {
        return 'template.create';
    }
}
