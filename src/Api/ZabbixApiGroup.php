<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use BadMethodCallException;
use Idiot\Zabbix\Requests\ZabbixRequest;
use Idiot\Zabbix\ZabbixApi;
use Idiot\Zabbix\ZabbixApiException;
use LogicException;

/**
 * Executes calls from one Zabbix request-builder group.
 *
 * @template TBuilder of object
 */
final class ZabbixApiGroup
{
    /**
     * @param TBuilder $builder
     */
    public function __construct(
        private readonly ZabbixApi $client,
        private readonly object $builder,
    ) {}

    /**
     * @param array<string, mixed>|ZabbixRequest $request
     *
     * @throws ZabbixApiException
     */
    public function get(array|ZabbixRequest $request = []): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /**
     * @param array<string, mixed>|ZabbixRequest $request
     *
     * @throws ZabbixApiException
     */
    public function create(array|ZabbixRequest $request): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /**
     * @param array<string, mixed>|list<mixed>|ZabbixRequest $request
     *
     * @throws ZabbixApiException
     */
    public function delete(array|ZabbixRequest $request): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /**
     * @param array<string, mixed>|ZabbixRequest $request
     *
     * @throws ZabbixApiException
     */
    public function update(array|ZabbixRequest $request): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /**
     * @param array<string, mixed> $filter
     *
     * @throws ZabbixApiException
     */
    public function filter(array $filter): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /**
     * @param array<string, mixed>|ZabbixRequest $request
     *
     * @throws ZabbixApiException
     */
    public function login(array|ZabbixRequest $request): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /**
     * @param list<mixed>|ZabbixRequest $request
     *
     * @throws ZabbixApiException
     */
    public function logout(array|ZabbixRequest $request = []): mixed
    {
        return $this->dispatch(__FUNCTION__, func_get_args());
    }

    /**
     * @throws ZabbixApiException
     */
    private function dispatch(string $name, array $arguments): mixed
    {
        if (!method_exists($this->builder, $name)) {
            throw new BadMethodCallException(sprintf(
                'Unknown Zabbix API helper %s::%s().',
                $this->builder::class,
                $name,
            ));
        }

        $request = $this->builder->{$name}(...$arguments);

        if (!$request instanceof ZabbixRequest) {
            throw new LogicException(sprintf(
                'Zabbix API helper %s::%s() must return a %s.',
                $this->builder::class,
                $name,
                ZabbixRequest::class,
            ));
        }

        return $this->client->request($request);
    }

    /**
     * @throws ZabbixApiException
     */
    public function __call(string $name, array $arguments): mixed
    {
        return $this->dispatch($name, $arguments);
    }
}
