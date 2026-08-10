<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class ScriptGetscriptsbyeventsSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for script.getscriptsbyevents, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/script/script.getscriptsbyevents',
            'title' => 'script.getscriptsbyevents',
            'description' => 'Retrieve all available scripts on the given event, or a specific script if a script ID is provided. When manualinput is provided, it substitutes the {MANUALINPUT} macro with the specified value.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/script/getscriptsbyevents',
            'oneOf' => [
                [
                    '$ref' => '#/$defs/eventScriptRequest',
                ],
                [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/$defs/eventScriptRequest',
                    ],
                ],
            ],
            '$defs' => [
                'eventScriptRequest' => [
                    'type' => 'object',
                    'properties' => [
                        'eventid' => [
                            'type' => 'string',
                            'description' => 'ID of event to return scripts for. Must be unique. Required.',
                        ],
                        'scriptid' => [
                            'type' => 'string',
                            'description' => 'ID of script to return.',
                        ],
                        'manualinput' => [
                            'type' => 'string',
                            'description' => 'Value of the user-provided {MANUALINPUT} macro value.',
                        ],
                    ],
                    'required' => [
                        'eventid',
                    ],
                    'additionalProperties' => false,
                ],
            ],
        ];
    }
}
