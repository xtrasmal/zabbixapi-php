<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class HostgroupMassremoveSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for hostgroup.massremove, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/hostgroup/hostgroup.massremove',
            'title' => 'hostgroup.massremove',
            'description' => 'Remove related objects from multiple host groups.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/hostgroup/massremove',
            'type' => 'object',
            'properties' => [
                'groupids' => [
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
                    'description' => 'IDs of the host groups to be updated. Parameter behavior: required.',
                ],
                'hostids' => [
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
                    'description' => 'IDs of the hosts to remove from all host groups.',
                ],
            ],
            'required' => [
                'groupids',
            ],
            'additionalProperties' => false,
        ];
    }
}
