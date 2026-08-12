<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * correlation.create - Create new correlations.
 */
final class CorrelationCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public array $filter,
        public array $operations,
        public ?string $description = null,
        public ?Enums\CorrelationStatus $status = null,
    ) {}

    public function method(): string
    {
        return 'correlation.create';
    }
}
