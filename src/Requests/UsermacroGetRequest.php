<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * usermacro.get - Retrieve host and global macros according to the given parameters.
 */
final class UsermacroGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'usermacro.get';
    }
}
