<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Request;
use LogicException;
use OutOfBoundsException;

/**
 * Accumulates Zabbix requests for one JSON-RPC batch.
 */
final class ZabbixBatch
{
    /** @var array<string, object> */
    private array $requestBuilders;

    /** @var array<string, ZabbixBatchGroup> */
    private array $groups = [];

    /** @var list<Request> */
    private array $queued = [];

    /**
     * @param array<string, object> $requestBuilders
     */
    public function __construct(array $requestBuilders)
    {
        $this->requestBuilders = $requestBuilders;
    }

    public function add(Request $request): Request
    {
        $this->queued[] = $request;

        return $request;
    }

    /** @return list<Request> */
    public function queuedRequests(): array
    {
        return $this->queued;
    }

    public function __set(string $name, mixed $_value): void
    {
        throw new LogicException(sprintf('Zabbix API batch group %s is read-only.', $name));
    }

    public function __get(string $name): ZabbixBatchGroup
    {
        if (!array_key_exists($name, $this->requestBuilders)) {
            throw new OutOfBoundsException(sprintf('Unknown Zabbix API group %s.', $name));
        }

        return $this->groups[$name] ??= new ZabbixBatchGroup($this, $this->requestBuilders[$name]);
    }

    public function __isset(string $name): bool
    {
        return array_key_exists($name, $this->requestBuilders);
    }
}
