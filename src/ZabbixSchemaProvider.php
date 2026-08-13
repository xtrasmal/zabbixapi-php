<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use Idiot\Zabbix\Requests\ZabbixRequest;

interface ZabbixSchemaProvider
{
    public function schemaFor(ZabbixRequest $request): RequestSchema;
}
