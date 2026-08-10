<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class ProxygroupUpdateSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for proxygroup.update, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/proxygroup/proxygroup.update',
            'title' => 'proxygroup.update',
            'description' => 'Update existing proxy groups.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/proxygroup/update',
            'type' => 'object',
            'properties' => [
                'proxy_groupid' => [
                    'type' => 'string',
                    'description' => 'ID of the proxy group. Property behavior: read-only; required for update operations.',
                ],
                'name' => [
                    'type' => 'string',
                    'description' => 'Name of the proxy group.',
                ],
                'description' => [
                    'type' => 'string',
                    'description' => 'Description of the proxy group.',
                ],
                'failover_delay' => [
                    'type' => 'string',
                    'description' => 'Period during which a proxy in the proxy group must communicate with Zabbix server to be considered online. Time suffixes are supported, e.g. 30s, 1m. User macros are supported. Possible values: 10s-15m. Default: 1m.',
                ],
                'min_online' => [
                    'type' => 'string',
                    'description' => 'Minimum number of online proxies required to keep the proxy group online. User macros are supported. Possible values range: 1-1000. Default: 1.',
                ],
            ],
            'required' => [
                'proxy_groupid',
            ],
            'additionalProperties' => false,
        ];
    }
}
