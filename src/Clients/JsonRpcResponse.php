<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Clients;

use InvalidArgumentException;
use JsonSerializable;

final class JsonRpcResponse implements JsonSerializable
{
    private function __construct(
        public readonly int|string|null $id,
        public readonly mixed $result = null,
        /** @var array{code: int, message: string, data?: mixed}|null */
        public readonly ?array $error = null,
        private readonly bool $hasResult = false,
    ) {}

    /**
     * @return array{jsonrpc: JsonRpcRequest::VERSION, id: int|string|null, result?: mixed, error?: array{code: int, message: string, data?: mixed}}
     */
    public function jsonSerialize(): array
    {
        return [
            'jsonrpc' => JsonRpcRequest::VERSION,
            'id' => $this->id,
            ...($this->hasResult ? ['result' => $this->result] : ['error' => $this->error]),
        ];
    }

    public static function fromResult(int|string|null $id, mixed $result = null): self
    {
        return new self($id, result: $result, hasResult: true);
    }

    /**
     * @param array{code: int, message: string, data?: mixed} $error
     */
    public static function fromError(int|string|null $id, array $error): self
    {
        return new self($id, error: self::validatedError($error));
    }

    /**
     * @return array{code: int, message: string, data?: mixed}
     */
    private static function validatedError(array $error): array
    {
        if (!array_key_exists('code', $error) || !is_int($error['code'])) {
            throw new InvalidArgumentException('JSON-RPC error objects must contain an integer code.');
        }

        if (!array_key_exists('message', $error) || !is_string($error['message'])) {
            throw new InvalidArgumentException('JSON-RPC error objects must contain a string message.');
        }

        return [
            'code' => $error['code'],
            'message' => $error['message'],
            ...(array_key_exists('data', $error) ? ['data' => $error['data']] : []),
        ];
    }
}
