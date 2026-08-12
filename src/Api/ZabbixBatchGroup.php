<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use BadMethodCallException;
use Idiot\Zabbix\Requests\ZabbixRequest;
use LogicException;

/**
 * Queues calls from one Zabbix request-builder group.
 *
 * @template TBuilder of object
 */
final class ZabbixBatchGroup
{
    /**
     * @param TBuilder $builder
     */
    public function __construct(
        private readonly ZabbixBatch $batch,
        private readonly object $builder,
    ) {}

    /** @param array<string, mixed>|ZabbixRequest $request */
    public function get(array|ZabbixRequest $request = []): ZabbixRequest
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|ZabbixRequest $request */
    public function create(array|ZabbixRequest $request): ZabbixRequest
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|list<mixed>|ZabbixRequest $request */
    public function delete(array|ZabbixRequest $request): ZabbixRequest
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|ZabbixRequest $request */
    public function update(array|ZabbixRequest $request): ZabbixRequest
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): ZabbixRequest
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|ZabbixRequest $request */
    public function login(array|ZabbixRequest $request): ZabbixRequest
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    /** @param list<mixed>|ZabbixRequest $request */
    public function logout(array|ZabbixRequest $request = []): ZabbixRequest
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    private function queue(string $name, array $arguments): ZabbixRequest
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

        return $this->batch->add($request);
    }

    public function __call(string $name, array $arguments): ZabbixRequest
    {
        return $this->queue($name, $arguments);
    }
}
