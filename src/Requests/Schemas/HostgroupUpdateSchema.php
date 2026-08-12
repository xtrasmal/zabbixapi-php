<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class HostgroupUpdateSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for hostgroup.update, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/hostgroup/hostgroup.update',
            'title' => 'hostgroup.update',
            'description' => 'Update existing host groups.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/hostgroup/update',
            'type' => 'object',
            'properties' => [
                'groupid' => [
                    'type' => 'string',
                    'description' => 'ID of the host group. Property behavior: read-only; required for update operations.',
                ],
                'name' => [
                    'type' => 'string',
                    'description' => 'Name of the host group.',
                ],
                'uuid' => [
                    'type' => 'string',
                    'description' => 'Universal unique identifier, used for linking imported host groups to already existing ones. Auto-generated, if not given.',
                ],
            ],
            'required' => [
                'groupid',
            ],
            'additionalProperties' => false,
        ];
    }
}
