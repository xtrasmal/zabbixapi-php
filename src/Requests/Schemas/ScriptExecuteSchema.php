<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class ScriptExecuteSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for script.execute, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/script/script.execute',
            'title' => 'script.execute',
            'description' => 'Run a script on a host or event. Except for URL type scripts, which are not executable.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/script/execute',
            'type' => 'object',
            'properties' => [
                'scriptid' => [
                    'type' => 'string',
                    'description' => 'ID of the script to run. Required.',
                ],
                'hostid' => [
                    'type' => 'string',
                    'description' => 'ID of the host to run the script on. Required if eventid is not set.',
                ],
                'eventid' => [
                    'type' => 'string',
                    'description' => 'ID of the event to run the script on. Required if hostid is not set.',
                ],
                'manualinput' => [
                    'type' => 'string',
                    'description' => 'User-provided value to run the script with, substituting the {MANUALINPUT} macro.',
                ],
            ],
            'required' => [
                'scriptid',
            ],
            'additionalProperties' => false,
        ];
    }
}
