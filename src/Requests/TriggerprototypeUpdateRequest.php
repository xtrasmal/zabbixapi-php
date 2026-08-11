<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * triggerprototype.update - Update existing trigger prototypes.
 */
final class TriggerprototypeUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $triggerid,
        public ?string $description = null,
        public ?string $expression = null,
        public ?string $event_name = null,
        public ?string $opdata = null,
        public ?string $comments = null,
        public ?Enums\TriggerprototypePriority $priority = null,
        public ?Enums\TriggerprototypeStatus $status = null,
        public ?Enums\TriggerprototypeType $type = null,
        public ?string $url = null,
        public ?string $url_name = null,
        public ?Enums\TriggerprototypeRecoveryMode $recovery_mode = null,
        public ?string $recovery_expression = null,
        public ?Enums\TriggerprototypeCorrelationMode $correlation_mode = null,
        public ?string $correlation_tag = null,
        public ?Enums\TriggerprototypeManualClose $manual_close = null,
        public ?Enums\TriggerprototypeDiscover $discover = null,
        public ?string $uuid = null,
        public ?array $dependencies = null,
        public ?array $tags = null,
    ) {}

    public function method(): string
    {
        return 'triggerprototype.update';
    }
}
