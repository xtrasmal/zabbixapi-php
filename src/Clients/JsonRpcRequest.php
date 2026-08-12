<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Clients;

use InvalidArgumentException;
use JsonSerializable;

final class JsonRpcRequest implements JsonSerializable
{
    public const VERSION = '2.0';

    private function __construct(
        public readonly string $method,
        public readonly ?array $params = null,
        public readonly int|string|null $id = null,
        private readonly bool $hasId = false,
    ) {}

    /**
     * @return array{jsonrpc: string, method: string, id?: int|string|null, params?: array}
     */
    public function jsonSerialize(): array
    {
        return [
            'jsonrpc' => self::VERSION,
            'method' => $this->method,
            ...($this->hasId ? ['id' => $this->id] : []),
            ...(is_null($this->params) ? [] : ['params' => $this->params]),
        ];
    }

    public static function request(string $method, int|string|null $id, ?array $params = null): self
    {
        self::assertMethod($method);

        return new self($method, $params, $id, true);
    }

    public static function notification(string $method, ?array $params = null): self
    {
        self::assertMethod($method);

        return new self($method, $params);
    }

    private static function assertMethod(string $method): void
    {
        if (str_starts_with($method, 'rpc.')) {
            throw new InvalidArgumentException('Methods beginning with "rpc." are reserved.');
        }
    }
}
