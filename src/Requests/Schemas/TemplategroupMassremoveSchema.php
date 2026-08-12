<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class TemplategroupMassremoveSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for templategroup.massremove, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/templategroup/templategroup.massremove',
            'title' => 'templategroup.massremove',
            'description' => 'Remove related objects from multiple template groups.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/templategroup/massremove',
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
                    'description' => 'IDs of the template groups to be updated. Parameter behavior: required.',
                ],
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
                    'description' => 'IDs of the templates to remove from all template groups. Parameter behavior: required.',
                ],
            ],
            'required' => [
                'groupids',
                'templateids',
            ],
            'additionalProperties' => false,
        ];
    }
}
