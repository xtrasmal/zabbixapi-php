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
    protected function request(string $requestClass, ZabbixRequest|array $request)
    {
        if ($request instanceof ZabbixRequest) {
            if (!$request instanceof $requestClass) {
                throw new \InvalidArgumentException(sprintf(
                    'Expected request of type %s, got %s.',
                    $requestClass,
                    $request::class,
                ));
            }

            /** @var T $request */
            return $request;
        }

        if (is_a($requestClass, AbstractZabbixRequest::class, true)) {
            return $requestClass::fromParams($request);
        }

        throw new \InvalidArgumentException(sprintf(
            'Request class %s must extend %s.',
            $requestClass,
            AbstractZabbixRequest::class,
        ));
    }

    /**
     * @template T of AbstractZabbixRequest
     *
     * @param class-string<T>      $requestClass
     * @param array<string, mixed> $filter
     *
     * @return T
     */
    protected function filterRequest(string $requestClass, array $filter)
    {
        return $this->request($requestClass, ['filter' => $filter]);
    }
}
