<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * module.create - Install new frontend modules.
 */
final class ModuleCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $id,
        public string $relative_path,
        public ?Enums\ModuleStatus $status = null,
        public ?array $config = null,
    ) {}

    public function method(): string
    {
        return 'module.create';
    }
}
