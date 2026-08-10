<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * action.update - Update existing actions.
 */
final class ActionUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $actionid,
        public ?string $esc_period = null,
        public ?Enums\ActionEventsource $eventsource = null,
        public ?string $name = null,
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
        return 'action.update';
    }
}
