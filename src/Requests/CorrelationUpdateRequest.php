<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * correlation.update - Update existing correlations.
 */
final class CorrelationUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $correlationid,
        public ?string $name = null,
        public ?string $description = null,
        public ?Enums\CorrelationStatus $status = null,
        public ?array $filter = null,
        public ?array $operations = null,
    ) {}

    public function method(): string
    {
        return 'correlation.update';
    }
}
