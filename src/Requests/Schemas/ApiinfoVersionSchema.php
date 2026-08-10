<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class ApiinfoVersionSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for apiinfo.version, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/apiinfo/apiinfo.version',
            'title' => 'apiinfo.version',
            'description' => 'Retrieve the version of the Zabbix API. Only available to unauthenticated users and must be called without the auth parameter in the JSON-RPC request.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/apiinfo/version',
            'type' => 'array',
            'minItems' => 0,
            'maxItems' => 0,
        ];
    }
}
