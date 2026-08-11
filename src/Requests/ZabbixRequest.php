<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

interface ZabbixRequest
{
    public function method(): string;

    /**
     * The method-specific Zabbix API params, exactly as an array accepted by
     * ZabbixApi::call($method, $params).
     */
    public function params(): array;
}
