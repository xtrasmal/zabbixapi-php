<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class HistoryClearSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for history.clear, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/history/history.clear',
            'title' => 'history.clear',
            'description' => 'Clear item history. Returns an object containing the IDs of the cleared items under the itemids property. Only available to Admin and Super admin user types.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/history/clear',
            'type' => 'array',
            'items' => [
                'type' => 'string',
            ],
            'minItems' => 1,
        ];
    }
}
