<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class TemplateDeleteSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for template.delete, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/template/template.delete',
            'title' => 'template.delete',
            'description' => 'Delete templates. Deleting a template causes deletion of all template entities (items, triggers, graphs, etc.). To leave template entities with the hosts, unlink the template first via template.update, template.massupdate, host.update, or host.massupdate.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/template/delete',
            'type' => 'array',
            'items' => [
                'type' => 'string',
            ],
            'minItems' => 1,
        ];
    }
}
