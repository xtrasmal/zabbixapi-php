<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * module.update - Update existing modules.
 */
final class ModuleUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $moduleid,
        public ?string $id = null,
        public ?string $relative_path = null,
        public ?Enums\ModuleStatus $status = null,
        public ?array $config = null,
    ) {}

    public function method(): string
    {
        return 'module.update';
    }
}
