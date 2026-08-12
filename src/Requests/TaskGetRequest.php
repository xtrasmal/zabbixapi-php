<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * task.get - Retrieve tasks according to the given parameters. Only available to Super admin user type.
 */
final class TaskGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $taskids = null,
        public array|string|null $output = null,
        public ?bool $preservekeys = null,
    ) {}

    public function method(): string
    {
        return 'task.get';
    }
}
