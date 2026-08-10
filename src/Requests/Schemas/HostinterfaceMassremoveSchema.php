<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class HostinterfaceMassremoveSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for hostinterface.massremove, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/hostinterface/hostinterface.massremove',
            'title' => 'hostinterface.massremove',
            'description' => 'Remove host interfaces from the given hosts.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/hostinterface/massremove',
            'type' => 'object',
            'properties' => [
                'interfaces' => [
                    'description' => 'Host interfaces to remove from the given hosts. The host interface object must have only the ip, dns and port properties defined. Parameter behavior: required.',
                    'oneOf' => [
                        [
                            '$ref' => '#/$defs/hostInterfaceRef',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                '$ref' => '#/$defs/hostInterfaceRef',
                            ],
                        ],
                    ],
                ],
                'hostids' => [
                    'description' => 'IDs of the hosts to be updated. Parameter behavior: required.',
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
                ],
            ],
            'required' => [
                'interfaces',
                'hostids',
            ],
            'additionalProperties' => false,
            '$defs' => [
                'hostInterfaceRef' => [
                    'type' => 'object',
                    'properties' => [
                        'ip' => [
                            'type' => 'string',
                            'description' => 'IP address used by the interface.',
                        ],
                        'dns' => [
                            'type' => 'string',
                            'description' => 'DNS name used by the interface.',
                        ],
                        'port' => [
                            'type' => 'string',
                            'description' => 'Port number used by the interface.',
                        ],
                    ],
                    'additionalProperties' => false,
                ],
            ],
        ];
    }
}
