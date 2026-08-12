<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class TrendGetSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for trend.get, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/trend/trend.get',
            'title' => 'trend.get',
            'description' => 'Retrieve trend data according to the given parameters.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/trend/get. NOTE: unlike most get methods, trend.get\'s documented parameter table is exhaustive and deliberately does NOT include the common get parameters (filter, search, searchByAny, searchWildcardsEnabled, excludeSearch, startSearch, editable, sortfield, sortorder, preservekeys) -- CTrend::get() reads directly from the trends/trends_uint tables and does not support them. Only itemids, time_from, time_till, countOutput, limit, and output are honored; the default merge-in-common-params rule was deliberately not applied here per the object\'s own docs.',
            'type' => 'object',
            'properties' => [
                'itemids' => [
                    'oneOf' => [
                        [
                            'type' => 'string',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                    ],
                    'description' => 'Return only trends with the given item IDs.',
                ],
                'time_from' => [
                    'type' => 'integer',
                    'description' => 'Return only values that have been collected after or at the given time.',
                ],
                'time_till' => [
                    'type' => 'integer',
                    'description' => 'Return only values that have been collected before or at the given time.',
                ],
                'countOutput' => [
                    'type' => 'boolean',
                    'description' => 'Count the number of retrieved objects.',
                ],
                'limit' => [
                    'type' => 'integer',
                    'description' => 'Limit the amount of retrieved objects.',
                ],
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
                    'description' => 'Set Trend object properties to be returned (clock, itemid, num, value_min, value_avg, value_max).',
                ],
            ],
            'additionalProperties' => false,
        ];
    }
}
