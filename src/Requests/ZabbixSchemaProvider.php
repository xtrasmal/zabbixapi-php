<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

interface ZabbixSchemaProvider
{
    public function schemaFor(string $method): RequestSchema;
}
