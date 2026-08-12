<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class ScriptDeleteSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for script.delete, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/script/script.delete',
            'title' => 'script.delete',
            'description' => 'Delete scripts.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/script/delete',
            'type' => 'array',
            'items' => [
                'type' => 'string',
            ],
            'minItems' => 1,
        ];
    }
}
