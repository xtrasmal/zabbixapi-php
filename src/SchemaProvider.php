<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

interface SchemaProvider
{
    public function schemaFor(Request $request): Schema;
}
