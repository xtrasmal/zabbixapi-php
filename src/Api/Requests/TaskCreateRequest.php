<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * task.create - Create new tasks. Accepts a single task object or an array of task objects (bulk create).
 */
final class TaskCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'task.create';
    }
}
