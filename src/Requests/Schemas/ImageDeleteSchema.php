<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class ImageDeleteSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for image.delete, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/image/image.delete',
            'title' => 'image.delete',
            'description' => 'Delete images.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/image/delete',
            'type' => 'array',
            'items' => [
                'type' => 'string',
            ],
            'minItems' => 1,
        ];
    }
}
