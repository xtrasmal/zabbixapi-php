<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Clients;

use JsonSerializable;

final class JsonRpcResponse implements JsonSerializable
{
    public const VERSION = '2.0';

    private function __construct(
        public readonly mixed $id,
        public readonly mixed $result = null,
        /** @var array<string, mixed>|null */
        public readonly ?array $error = null,
        private readonly bool $hasResult = false,
    ) {}

    /**
     * @return array{jsonrpc: self::VERSION, id: mixed, result?: mixed, error?: array<string, mixed>|null}
     */
    public function jsonSerialize(): array
    {
        return [
            'jsonrpc' => self::VERSION,
            'id' => $this->id,
            ...($this->hasResult ? ['result' => $this->result] : ['error' => $this->error]),
        ];
    }

    public static function fromResult(mixed $id, mixed $result = null): self
    {
        return new self($id, result: $result, hasResult: true);
    }

    /**
     * @param array<string, mixed> $error
     */
    public static function fromError(mixed $id, array $error): self
    {
        return new self($id, error: $error);
    }
}
