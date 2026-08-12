<?php

declare(strict_types=1);

namespace Idiot\Zabbix\JsonRpc;

use InvalidArgumentException;

/**
 * When a rpc call is made, the Server MUST reply with a Response, except for in the case of Notifications. The Response is expressed as a single JSON Object, with the following members:
 *
 * jsonrpc
 * A String specifying the version of the JSON-RPC protocol. MUST be exactly '2.0'.
 * result
 * This member is REQUIRED on success.
 * This member MUST NOT exist if there was an error invoking the method.
 * The value of this member is determined by the method invoked on the Server.
 * error
 * This member is REQUIRED on error.
 * This member MUST NOT exist if there was no error triggered during invocation.
 * The value for this member MUST be an Object as defined in section 5.1.
 * id
 * This member is REQUIRED.
 * It MUST be the same as the value of the id member in the Request Object.
 * If there was an error in detecting the id in the Request object (e.g. Parse error/Invalid Request), it MUST be Null.
 * Either the result member or error member MUST be included, but both members MUST NOT be included.
 */
final class Response implements \JsonSerializable
{
    private function __construct(
        public readonly int|string|null $id,
        public readonly array|bool|float|int|string|null $result = null,
        /** @var array{code: int, message: string, data?: array|bool|float|int|string|null}|null */
        public readonly ?array $error = null,
        private readonly bool $hasResult = false,
    ) {}

    /**
     * @return array{jsonrpc: Request::VERSION, id: int|string|null, result?: array|bool|float|int|string|null, error?: array{code: int, message: string, data?: array|bool|float|int|string|null}}
     */
    public function jsonSerialize(): array
    {
        return [
            'jsonrpc' => Request::VERSION,
            'id' => $this->id,
            ...($this->hasResult ? ['result' => $this->result] : ['error' => $this->error]),
        ];
    }

    public static function fromResult(int|string|null $id, array|bool|float|int|string|null $result = null): self
    {
        return new self($id, result: $result, hasResult: true);
    }

    /**
     * @param array{code: int, message: string, data?: array|bool|float|int|string|null} $error
     */
    public static function fromError(int|string|null $id, array $error): self
    {
        return new self($id, error: self::validatedError($error));
    }

    /**
     * @return array{code: int, message: string, data?: array|bool|float|int|string|null}
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
