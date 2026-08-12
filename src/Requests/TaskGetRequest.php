<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * task.get - Retrieve tasks according to the given parameters. Only available to Super admin user type.
 */
final class TaskGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'task.get';
    }
}
