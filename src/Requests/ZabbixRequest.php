<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

interface ZabbixRequest
{
    public static function method(): string;

    /**
     * The JSON-RPC "params" payload: an associative array for object-shaped
     * requests, a list for list-shaped requests. The JSON root shape (object
     * vs array) is applied at encode/validate time.
     */
    public function params(): array;
}
