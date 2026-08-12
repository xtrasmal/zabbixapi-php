<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class SettingsGetSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for settings.get, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/settings/settings.get',
            'title' => 'settings.get',
            'description' => 'Retrieve the settings object according to the given parameters.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/settings/get . The docs state the method supports only one parameter (output); the general common-get-parameter set (filter, search, limit, sortfield, etc.) is NOT documented for this method and is intentionally omitted here. This method is available to users of any type (permission can be revoked via user role settings).',
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
                    'description' => 'This parameter is described in the reference commentary (common get-method parameters): object properties to be returned. Default: extend.',
                ],
            ],
            'additionalProperties' => false,
        ];
    }
}
