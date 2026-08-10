<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * service.create - Create new services.
 */
final class ServiceCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public Enums\ServiceAlgorithm $algorithm,
        public int $sortorder,
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

    public static function method(): string
    {
        return 'service.create';
    }
}
