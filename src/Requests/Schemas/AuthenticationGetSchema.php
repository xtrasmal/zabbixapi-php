<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class AuthenticationGetSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for authentication.get, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/authentication/authentication.get',
            'title' => 'authentication.get',
            'description' => 'Retrieve authentication settings according to the given parameters. Only available to Super admin user type.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/authentication/get . The docs state the method supports only one parameter (output); the general common-get-parameter set (filter, search, limit, sortfield, etc.) is NOT documented for this method and is intentionally omitted here.',
            'type' => 'object',
            'properties' => [
                'output' => [
                    'oneOf' => [
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                        [
                            'enum' => [
                                'extend',
                                'count',
                            ],
                        ],
                    ],
                    'description' => 'Object properties to be returned. Default: extend.',
                ],
            ],
            'additionalProperties' => false,
        ];
    }
}
