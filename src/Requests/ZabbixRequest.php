<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

interface ZabbixRequest
{
    public function method(): string;

    public function params(): array;
}
