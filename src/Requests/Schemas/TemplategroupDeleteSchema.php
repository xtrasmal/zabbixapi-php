<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class TemplategroupDeleteSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for templategroup.delete, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/templategroup/templategroup.delete',
            'title' => 'templategroup.delete',
            'description' => 'Delete template groups. A template group cannot be deleted if it contains templates that belong to this group only.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/templategroup/delete',
            'type' => 'array',
            'items' => [
                'type' => 'string',
                'description' => 'ID of the template group to delete.',
            ],
            'minItems' => 1,
        ];
    }
}
