<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * service.update - Update existing services.
 */
final class ServiceUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $serviceid,
        public ?Enums\ServiceAlgorithm $algorithm = null,
        public ?string $name = null,
        public ?int $sortorder = null,
        public ?int $weight = null,
        public ?Enums\PropagationRule $propagation_rule = null,
        public ?Enums\PropagationValue $propagation_value = null,
        public ?string $description = null,
        public ?string $uuid = null,
        public ?int $created_at = null,
        public ?array $children = null,
        public ?array $parents = null,
        public ?array $tags = null,
        public ?array $problem_tags = null,
        public ?array $status_rules = null,
    ) {}

    public function method(): string
    {
        return 'service.update';
    }
}
