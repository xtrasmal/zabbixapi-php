<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ZabbixRequest;

/**
 * Queues calls from one Zabbix request-builder group.
 *
 * @template TBuilder of object
 */
final class ZabbixBatchGroup
{
    /**
     * @param TBuilder $requests
     */
    public function __construct(
        private readonly ZabbixBatch $batch,
        private readonly object $requests,
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

        return $this->batch->add($request);
    }

    public function __call(string $name, array $arguments): ZabbixRequest
    {
        return $this->queue($name, $arguments);
    }
}
