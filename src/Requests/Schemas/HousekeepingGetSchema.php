<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class HousekeepingGetSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for housekeeping.get, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/housekeeping/housekeeping.get',
            'title' => 'housekeeping.get',
            'description' => 'Retrieve housekeeping object according to the given parameters.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/housekeeping/get . The docs state the method supports only one parameter (output); the general common-get-parameter set (filter, search, limit, sortfield, etc.) is NOT documented for this method and is intentionally omitted here.',
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
