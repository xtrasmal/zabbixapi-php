<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\AbstractZabbixRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;

abstract class AbstractApi
{
    /**
     * @template T of AbstractZabbixRequest
     *
     * @param class-string<T>                    $requestClass
     * @param T|array<string, mixed>|list<mixed> $request
     *
     * @return T
     */
    protected function request(string $requestClass, ZabbixRequest|array $request): ZabbixRequest
    {
        return $request instanceof ZabbixRequest
            ? $request
            : $requestClass::fromParams($request);
    }

    /**
     * @template T of AbstractZabbixRequest
     *
     * @param class-string<T>      $requestClass
     * @param array<string, mixed> $filter
     *
     * @return T
     */
    protected function filterRequest(string $requestClass, array $filter): ZabbixRequest
    {
        return $this->request($requestClass, ['filter' => $filter]);
    }
}
