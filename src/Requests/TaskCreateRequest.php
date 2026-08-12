<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * task.create - Create new tasks. Accepts a single task object or an array of task objects (bulk create).
 */
final class TaskCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'task.create';
    }
}
