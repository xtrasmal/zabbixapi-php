<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class UserdirectoryDeleteSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for userdirectory.delete, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/userdirectory/userdirectory.delete',
            'title' => 'userdirectory.delete',
            'description' => 'Delete user directories. A user directory cannot be deleted when it is directly used for at least one user group. The default LDAP user directory cannot be deleted when authentication.ldap_configured is set to 1 or when there are more user directories left.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/userdirectory/delete',
            'type' => 'array',
            'items' => [
                'type' => 'string',
            ],
            'minItems' => 1,
        ];
    }
}
