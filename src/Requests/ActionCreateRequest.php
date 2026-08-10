<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * action.create - Create new actions.
 */
final class ActionCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public Enums\ActionEventsource $eventsource,
        public string $name,
        public ?string $esc_period = null,
        public ?Enums\ActionStatus $status = null,
        public ?Enums\PauseSymptoms $pause_symptoms = null,
        public ?Enums\PauseSuppressed $pause_suppressed = null,
        public ?Enums\NotifyIfCanceled $notify_if_canceled = null,
        public ?array $filter = null,
        public ?array $operations = null,
        public ?array $recovery_operations = null,
        public ?array $update_operations = null,
    ) {}

    public static function method(): string
    {
        return 'action.create';
    }
}
