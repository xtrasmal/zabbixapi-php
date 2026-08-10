<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class TemplateMassremoveSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for template.massremove, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/template/template.massremove',
            'title' => 'template.massremove',
            'description' => 'Remove related objects from multiple templates.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/template/massremove',
            'type' => 'object',
            'properties' => [
                'templateids' => [
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
                    'description' => 'IDs of the templates to be updated. Parameter behavior: required.',
                ],
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
                    'description' => 'IDs of the template groups from which to remove the given templates.',
                ],
                'macros' => [
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
                    'description' => 'IDs of the user macros to delete from the given templates.',
                ],
                'templateids_clear' => [
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
                    'description' => 'IDs of the templates to unlink and clear from the given templates (upstream).',
                ],
                'templateids_link' => [
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
                    'description' => 'IDs of the templates to unlink from the given templates (upstream).',
                ],
            ],
            'required' => [
                'templateids',
            ],
            'additionalProperties' => false,
        ];
    }
}
