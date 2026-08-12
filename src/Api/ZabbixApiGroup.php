<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ZabbixRequest;
use Idiot\Zabbix\ZabbixApi;

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
    ) {}

    /** @param array<string, mixed>|ZabbixRequest $request */
    public function get(array|ZabbixRequest $request = []): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|ZabbixRequest $request */
    public function create(array|ZabbixRequest $request): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|list<mixed>|ZabbixRequest $request */
    public function delete(array|ZabbixRequest $request): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|ZabbixRequest $request */
    public function update(array|ZabbixRequest $request): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|ZabbixRequest $request */
    public function login(array|ZabbixRequest $request): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /** @param list<mixed>|ZabbixRequest $request */
    public function logout(array|ZabbixRequest $request = []): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    private function dispatch(string $name, array $arguments): mixed
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

    public function __call(string $name, array $arguments): mixed
    {
        return $this->dispatch($name, $arguments);
    }
}
