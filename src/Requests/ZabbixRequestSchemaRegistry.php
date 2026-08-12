<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

interface ZabbixRequestSchemaRegistry
{
    public function schemaFor(string $method): RequestSchema;
}
