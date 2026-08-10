<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * event.acknowledge - Update events: close, acknowledge/unacknowledge, add a message, change severity, suppress/unsuppress, or change event rank.
 */
final class EventAcknowledgeRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array $eventids,
        public int $action,
        public ?string $cause_eventid = null,
        public ?string $message = null,
        public ?Enums\EventSeverity $severity = null,
        public ?int $suppress_until = null,
    ) {}

    public static function method(): string
    {
        return 'event.acknowledge';
    }
}
