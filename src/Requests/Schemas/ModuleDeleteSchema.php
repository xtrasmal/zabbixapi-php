<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class ModuleDeleteSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for module.delete, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/module/module.delete',
            'title' => 'module.delete',
            'description' => 'Uninstall modules.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/module/delete',
            'type' => 'array',
            'items' => [
                'type' => 'string',
            ],
            'minItems' => 1,
        ];
    }
}
