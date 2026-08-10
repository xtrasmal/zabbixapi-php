<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

interface ZabbixRequestSchemaRegistry
{
    public function schemaFor(string $method): RequestSchema;
}
