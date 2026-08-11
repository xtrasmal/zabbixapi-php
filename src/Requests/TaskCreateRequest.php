<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * task.create - Create new tasks. Accepts a single task object or an array of task objects (bulk create).
 */
final class TaskCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public Enums\TaskType $type,
        public array $request,
        public ?string $proxyid = null,
    ) {}

    public function method(): string
    {
        return 'task.create';
    }
}
