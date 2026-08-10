<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * A value object that carries a single Zabbix API scalar (an ID, a flag).
 * The wire form is produced by toZabbixValue().
 */
interface ZabbixParameter
{
    public function toZabbixValue(): string|int;
}
