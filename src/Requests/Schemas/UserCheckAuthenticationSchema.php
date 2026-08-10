<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class UserCheckAuthenticationSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for user.checkAuthentication, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/user/user.checkAuthentication',
            'title' => 'user.checkAuthentication',
            'description' => 'Check and prolong the user session. Calling this method using the sessionid parameter prolongs the user session by default.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/user/checkauthentication',
            'type' => 'object',
            'properties' => [
                'extend' => [
                    'type' => 'boolean',
                    'description' => 'Whether to prolong the user session. Default value: true. Setting the value to false allows to check the user session without prolonging it. Parameter behavior: supported if sessionid is set.',
                ],
                'sessionid' => [
                    'type' => 'string',
                    'description' => 'User authentication token. Parameter behavior: required if token is not set.',
                ],
                'token' => [
                    'type' => 'string',
                    'description' => 'User API token. Parameter behavior: required if sessionid is not set.',
                ],
            ],
            'additionalProperties' => false,
        ];
    }
}
