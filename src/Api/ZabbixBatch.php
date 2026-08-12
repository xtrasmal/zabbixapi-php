<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api;

use Idiot\Zabbix\Requests\ZabbixRequest;

/**
 * Accumulates Zabbix requests for one JSON-RPC batch.
 */
final class ZabbixBatch
{
    private ZabbixRequestApi $requests;

    /** @var array<string, ZabbixBatchGroup> */
    private array $groups = [];

    /** @var list<ZabbixRequest> */
    private array $queued = [];

    public function __construct(?ZabbixRequestApi $requests = null)
    {
        $this->requests = $requests ?? new ZabbixRequestApi();
    }

    public function add(ZabbixRequest $request): ZabbixRequest
    {
        $this->queued[] = $request;

        return $request;
    }

    /** @return list<ZabbixRequest> */
    public function queuedRequests(): array
    {
        return $this->queued;
    }

    public function __get(string $name): ZabbixBatchGroup
    {
        if (!property_exists($this->requests, $name)) {
            throw new \OutOfBoundsException(sprintf('Unknown Zabbix API group %s.', $name));
        }

        return $this->groups[$name] ??= new ZabbixBatchGroup($this, $this->requests->{$name});
    }
}
