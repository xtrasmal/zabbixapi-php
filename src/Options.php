<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use Idiot\Zabbix\Clients\JsonRpcClient;
use Psr\Http\Client\ClientInterface;
use RuntimeException;

/**
 * Resolved, validated Zabbix client configuration.
 *
 * Accepts a plain options bag, rejects unknown keys and missing credentials, and
 * exposes a ready-to-use {@see JsonRpcClient} on {@see $client}.
 */
final class Options
{
    public const DEFAULT_TIMEOUT = 30;
    public const DEFAULT_CONNECTION_TIMEOUT = 10;

    /** @var list<string> */
    private const KNOWN_OPTIONS = [
        'url',
        'token',
        'debug',
        'verify',
        'timeout',
        'connect_timeout',
        'client',
    ];

    public readonly JsonRpcClient $client;

    private function __construct(
        public readonly string $url,
        public readonly string $token,
        public readonly bool $debug,
        public readonly bool $verify,
        public readonly int $timeout,
        public readonly int $connectTimeout,
        ?ClientInterface $client = null,
    ) {
        $this->client = new JsonRpcClient([
            'url' => $this->url,
            'token' => $this->token,
            'client' => $client,
        ]);
    }

    /**
     * @param array<string, mixed> $options
     *
     * @throws RuntimeException
     */
    public static function fromArray(array $options): self
    {
        foreach (array_keys($options) as $key) {
            if (!in_array($key, self::KNOWN_OPTIONS, true)) {
                throw new RuntimeException(sprintf('Unknown Zabbix API option: "%s".', $key));
            }
        }

        $url = (string)($options['url'] ?? '');
        $token = (string)($options['token'] ?? '');

        if ('' === $url) {
            throw new RuntimeException('Missing Zabbix URL.');
        }

        if ('' === $token) {
            throw new RuntimeException('Missing Zabbix API token.');
        }

        $client = $options['client'] ?? null;

        if (null !== $client && !$client instanceof ClientInterface) {
            throw new RuntimeException('Zabbix API option "client" must be a PSR-18 ClientInterface.');
        }

        return new self(
            url: $url,
            token: $token,
            debug: (bool)($options['debug'] ?? false),
            verify: (bool)($options['verify'] ?? false),
            timeout: (int)($options['timeout'] ?? self::DEFAULT_TIMEOUT),
            connectTimeout: (int)($options['connect_timeout'] ?? self::DEFAULT_CONNECTION_TIMEOUT),
            client: $client,
        );
    }
}
