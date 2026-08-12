<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class TemplategroupPropagateSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for templategroup.propagate, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/templategroup/templategroup.propagate',
            'title' => 'templategroup.propagate',
            'description' => 'Apply permissions to all of the given template groups\' subgroups.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/templategroup/propagate',
            'type' => 'object',
            'properties' => [
                'groups' => [
                    'oneOf' => [
                        [
                            '$ref' => '#/$defs/templateGroupRef',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                '$ref' => '#/$defs/templateGroupRef',
                            ],
                        ],
                    ],
                    'description' => 'Template groups to propagate. The template groups must have only the groupid property defined. Parameter behavior: required.',
                ],
                'permissions' => [
                    'type' => 'boolean',
                    'description' => 'Set to true if need to propagate permissions. Parameter behavior: required.',
                ],
            ],
            'required' => [
                'groups',
                'permissions',
            ],
            'additionalProperties' => false,
            '$defs' => [
                'templateGroupRef' => [
                    'type' => 'object',
                    'description' => 'Reference to an existing template group by groupid only.',
                    'properties' => [
                        'groupid' => [
                            'type' => 'string',
                            'description' => 'ID of the template group.',
                        ],
                    ],
                    'required' => [
                        'groupid',
                    ],
                    'additionalProperties' => false,
                ],
            ],
        ];
    }
}
