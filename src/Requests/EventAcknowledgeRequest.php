<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * event.acknowledge - Update events: close, acknowledge/unacknowledge, add a message, change severity, suppress/unsuppress, or change event rank.
 */
final class EventAcknowledgeRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'event.acknowledge';
    }
}
