<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class TemplateMassaddSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for template.massadd, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/template/template.massadd',
            'title' => 'template.massadd',
            'description' => 'Simultaneously add multiple related objects to the given templates.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/template/massadd',
            'type' => 'object',
            'properties' => [
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
                    'description' => 'Templates to be updated. The templates must have only the templateid property defined. Parameter behavior: required.',
                ],
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
                    'description' => 'Template groups to add the given templates to. The template groups must have only the groupid property defined.',
                ],
                'macros' => [
                    'oneOf' => [
                        [
                            'type' => 'object',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'object',
                            ],
                        ],
                    ],
                    'description' => 'User macros to be created for the given templates. See the User macro object (reference/usermacro/object).',
                ],
                'templates_link' => [
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
                    'description' => 'Templates to link to the given templates. The templates must have only the templateid property defined.',
                ],
            ],
            'required' => [
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
