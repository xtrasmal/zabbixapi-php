<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class RequestFactory
{
    private ZabbixRequestRegistry $map;

    public function __construct(
        ?ZabbixRequestRegistry $map = null,
        private ?ZabbixRequestValidator $validator = null,
    ) {
        $this->map = $map ?? new StaticRequestRegistry();
    }

    /**
     * @param array<string, mixed>|list<mixed> $params
     */
    public function make(string $method, array $params = []): ZabbixRequest
    {
        $request = $this->map->requestFor($method, $params);
        $this->validator?->validate($request);

        return $request;
    }

    public static function validated(): self
    {
        return new self(validator: ZabbixRequestValidator::createDefault());
    }

    public static function plain(): self
    {
        return new self();
    }
}
