<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class HostgroupCreateSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for hostgroup.create, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/hostgroup/hostgroup.create',
            'title' => 'hostgroup.create',
            'description' => 'Create new host groups.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/hostgroup/create',
            'type' => 'object',
            'properties' => [
                'name' => [
                    'type' => 'string',
                    'description' => 'Name of the host group. Property behavior: required for create operations.',
                ],
                'uuid' => [
                    'type' => 'string',
                    'description' => 'Universal unique identifier, used for linking imported host groups to already existing ones. Auto-generated, if not given.',
                ],
            ],
            'required' => [
                'name',
            ],
            'additionalProperties' => false,
        ];
    }
}
