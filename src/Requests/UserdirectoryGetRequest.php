<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * userdirectory.get - Retrieve user directories according to the given parameters.
 */
final class UserdirectoryGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'userdirectory.get';
    }
}
