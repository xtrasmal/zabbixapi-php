<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

use IntelliTrend\Zabbix\Requests\ZabbixRequest;
use IntelliTrend\Zabbix\ZabbixApi;

/**
 * Executes calls from one Zabbix request-builder group.
 *
 * @template TBuilder of object
 */
final class ZabbixApiGroup
{
    /**
     * @param TBuilder $requests
     */
    public function __construct(
        private readonly ZabbixApi $client,
        private readonly object $requests,
    ) {
    }

    /** @param array<string, mixed>|ZabbixRequest $request */
    public function get(array|ZabbixRequest $request = []): array|bool|float|int|string|null
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|ZabbixRequest $request */
    public function create(array|ZabbixRequest $request): array|bool|float|int|string|null
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|list<mixed>|ZabbixRequest $request */
    public function delete(array|ZabbixRequest $request): array|bool|float|int|string|null
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|ZabbixRequest $request */
    public function update(array|ZabbixRequest $request): array|bool|float|int|string|null
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): array|bool|float|int|string|null
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|ZabbixRequest $request */
    public function login(array|ZabbixRequest $request): array|bool|float|int|string|null
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    public function __call(string $name, array $arguments): array|bool|float|int|string|null
    {
        return $this->dispatch($name, $arguments);
    }

    private function dispatch(string $name, array $arguments): array|bool|float|int|string|null
    {
        if (!method_exists($this->requests, $name)) {
            throw new \BadMethodCallException(sprintf(
                'Unknown Zabbix API helper %s::%s().',
                $this->requests::class,
                $name,
            ));
        }

        $request = $this->requests->{$name}(...$arguments);

        if (!$request instanceof ZabbixRequest) {
            throw new \LogicException(sprintf(
                'Zabbix API helper %s::%s() must return a %s.',
                $this->requests::class,
                $name,
                ZabbixRequest::class,
            ));
        }

        return $this->client->request($request);
    }

    /**
     * @return TBuilder
     */
    public function requests(): object
    {
        return $this->requests;
    }
}
