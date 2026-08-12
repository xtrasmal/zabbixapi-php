<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

interface ZabbixRequestRegistry
{
    /** @return list<string> */
    public function methods(): array;

    /** @return class-string<ZabbixRequest> */
    public function requestClassFor(string $method): string;

    /**
     * @param array<string, mixed>|list<mixed> $params
     */
    public function requestFor(string $method, array $params = []): ZabbixRequest;
}
