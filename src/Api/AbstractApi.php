<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\AbstractZabbixListRequest;
use IntelliTrend\Zabbix\Requests\AbstractZabbixRequest;
use IntelliTrend\Zabbix\Requests\ZabbixRequest;

abstract class AbstractApi
{
    /**
     * @template T of AbstractZabbixRequest|AbstractZabbixListRequest
     *
     * @param class-string<T> $requestClass
     * @param T|array<string, mixed>|list<mixed> $request
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

        if (is_a($requestClass, AbstractZabbixListRequest::class, true)) {
            return $requestClass::fromParams($request);
        }

        throw new \InvalidArgumentException(sprintf(
            'Request class %s must extend %s or %s.',
            $requestClass,
            AbstractZabbixRequest::class,
            AbstractZabbixListRequest::class,
        ));
    }
}
