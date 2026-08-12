<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * trigger.create - Create new triggers.
 */
final class TriggerCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $description,
        public string $expression,
        public ?string $event_name = null,
        public ?string $opdata = null,
        public ?string $comments = null,
        public ?Enums\TriggerPriority $priority = null,
        public ?Enums\TriggerStatus $status = null,
        public ?Enums\TriggerType $type = null,
        public ?string $url = null,
        public ?string $url_name = null,
        public ?Enums\TriggerRecoveryMode $recovery_mode = null,
        public ?string $recovery_expression = null,
        public ?Enums\TriggerCorrelationMode $correlation_mode = null,
        public ?string $correlation_tag = null,
        public ?Enums\TriggerManualClose $manual_close = null,
        public ?string $uuid = null,
        public ?array $dependencies = null,
        public ?array $tags = null,
    ) {}

    public function method(): string
    {
        return 'trigger.create';
    }
}
