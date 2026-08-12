<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * userdirectory.test - Test user directory connection settings. Also allows testing what configured data matches the user directory settings for user provisioning (e.g., what user role, user groups, user medias will be assigned to the user); for this type of test the request should be made for a user directory that has provision_status set to enabled. Since userdirectory.get does not return the bind_password field, userdirectoryid and/or bind_password should be supplied.
 */
final class UserdirectoryTestRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'userdirectory.test';
    }
}
