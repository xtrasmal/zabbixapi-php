<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use BadMethodCallException;
use Idiot\Zabbix\Request;
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

    /** @param array<string, mixed>|Request $request */
    public function get(array|Request $request = []): Request
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|Request $request */
    public function create(array|Request $request): Request
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|list<mixed>|Request $request */
    public function delete(array|Request $request): Request
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|Request $request */
    public function update(array|Request $request): Request
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed> $filter */
    public function filter(array $filter): Request
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    /** @param array<string, mixed>|Request $request */
    public function login(array|Request $request): Request
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    /** @param list<mixed>|Request $request */
    public function logout(array|Request $request = []): Request
    {
        return $this->queue(__FUNCTION__, func_get_args());
    }

    private function queue(string $name, array $arguments): Request
    {
        if (!method_exists($this->builder, $name)) {
            throw new BadMethodCallException(sprintf(
                'Unknown Zabbix API helper %s::%s().',
                $this->builder::class,
                $name,
            ));
        }

        $request = $this->builder->{$name}(...$arguments);

        if (!$request instanceof Request) {
            throw new LogicException(sprintf(
                'Zabbix API helper %s::%s() must return a %s.',
                $this->builder::class,
                $name,
                Request::class,
            ));
        }

        return $this->batch->add($request);
    }

    public function __call(string $name, array $arguments): Request
    {
        return $this->queue($name, $arguments);
    }
}
