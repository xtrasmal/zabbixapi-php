<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class UserResettotpSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for user.resettotp, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/user/user.resettotp',
            'title' => 'user.resettotp',
            'description' => 'Reset user TOTP secrets. User sessions for the specified users will also be deleted (except for the user sending the request).',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/user/resettotp',
            'type' => 'array',
            'items' => [
                'type' => 'string',
                'description' => 'ID of the user for which to reset the TOTP secret.',
            ],
            'minItems' => 1,
        ];
    }
}
