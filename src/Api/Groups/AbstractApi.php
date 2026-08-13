<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Groups;

use Idiot\Zabbix\Api\Requests\AbstractRequest;
use Idiot\Zabbix\Request;

abstract class AbstractApi
{
    /**
     * @template T of AbstractRequest
     *
     * @param class-string<T>                    $requestClass
     * @param AbstractRequest|array<string, mixed>|list<mixed> $request
     *
     * @return AbstractRequest
     */
    protected function request(string $requestClass, Request|array $request): Request
    {
        return $request instanceof Request
            ? $request
            : $requestClass::fromParams($request);
    }

    /**
     * @template T of AbstractRequest
     *
     * @param class-string<T>      $requestClass
     * @param array<string, mixed> $filter
     *
     * @return AbstractRequest
     */
    protected function filterRequest(string $requestClass, array $filter): Request
    {
        return $this->request($requestClass, ['filter' => $filter]);
    }
}
