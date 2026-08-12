<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class TemplategroupMassupdateSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for templategroup.massupdate, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/templategroup/templategroup.massupdate',
            'title' => 'templategroup.massupdate',
            'description' => 'Replace templates with the specified ones in multiple template groups. All other templates, except the ones mentioned, will be excluded from the given template groups.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/templategroup/massupdate',
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
                    'description' => 'Template groups to be updated. The template groups must have only the groupid property defined. Parameter behavior: required.',
                ],
                'templates' => [
                    'oneOf' => [
                        [
                            '$ref' => '#/$defs/templateRef',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                '$ref' => '#/$defs/templateRef',
                            ],
                        ],
                    ],
                    'description' => 'Templates to replace the current templates on the given template groups. All other templates, except the ones mentioned, will be excluded from template groups. The templates must have only the templateid property defined. Parameter behavior: required.',
                ],
            ],
            'required' => [
                'groups',
                'templates',
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
                'templateRef' => [
                    'type' => 'object',
                    'description' => 'Reference to an existing template by templateid only.',
                    'properties' => [
                        'templateid' => [
                            'type' => 'string',
                            'description' => 'ID of the template.',
                        ],
                    ],
                    'required' => [
                        'templateid',
                    ],
                    'additionalProperties' => false,
                ],
            ],
        ];
    }
}
