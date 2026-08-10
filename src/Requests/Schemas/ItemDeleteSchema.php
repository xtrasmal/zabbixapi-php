<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class ItemDeleteSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for item.delete, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/item/item.delete',
            'title' => 'item.delete',
            'description' => 'Delete items. IDs of the items to delete. Dependent items and item prototypes are removed automatically if the master item is deleted. Web items cannot be deleted via the Zabbix API.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/item/delete',
            'type' => 'array',
            'items' => [
                'type' => 'string',
            ],
            'minItems' => 1,
        ];
    }
}
