<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use GuzzleHttp\Client as GuzzleClient;
use Idiot\Zabbix\Clients\HttpClient;
use Idiot\Zabbix\Clients\JsonRpcClient;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use RuntimeException;

final class ZabbixApiOptions
{
    public const DEFAULT_TIMEOUT = 30;
    public const DEFAULT_CONNECTION_TIMEOUT = 10;
    private const OPTION_NAMES = [
        'url',
        'token',
        'debug',
        'verify',
        'timeout',
        'connect_timeout',
        'logger',
    ];

    private function __construct(
        public readonly string $url,
        public readonly string $token,
        public readonly bool $debug,
        public readonly bool|string $verify,
        public readonly int|float $timeout,
        public readonly int|float $connectTimeout,
        public readonly LoggerInterface $logger,
        public readonly JsonRpcClient $client,
    ) {}

    /**
     * @param array<string, mixed> $options
     */
    public static function fromArray(array $options): self
    {
        self::rejectUnknownOptions($options);

        $url = self::requiredString($options, 'url', 'Missing Zabbix URL.');
        $token = self::requiredString($options, 'token', 'Missing Zabbix API token.');

        $debug = self::bool($options, 'debug', false);
        $verify = self::verify($options);
        $timeout = self::number($options, 'timeout', self::DEFAULT_TIMEOUT);
        $connectTimeout = self::number($options, 'connect_timeout', self::DEFAULT_CONNECTION_TIMEOUT);
        $logger = self::logger($options);

        return new self(
            url: $url,
            token: $token,
            debug: $debug,
            verify: $verify,
            timeout: $timeout,
            connectTimeout: $connectTimeout,
            logger: $logger,
            client: self::client($url, $token, $connectTimeout, $debug, $timeout, $verify, $logger),
        );
    }

    /**
     * @param array<string, mixed> $options
     */
    private static function rejectUnknownOptions(array $options): void
    {
        $unknown = array_diff(array_keys($options), self::OPTION_NAMES);

        if ([] === $unknown) {
            return;
        }

        sort($unknown);

        throw new RuntimeException(sprintf(
            'Unknown Zabbix API option%s: %s.',
            1 === count($unknown) ? '' : 's',
            implode(', ', array_map(static fn (string $option): string => "\"$option\"", $unknown)),
        ));
    }

    /**
     * @param array<string, mixed> $options
     */
    private static function requiredString(array $options, string $key, string $missingMessage): string
    {
        if (!array_key_exists($key, $options) || null === $options[$key]) {
            throw new RuntimeException($missingMessage);
        }

        $value = $options[$key];

        if (!is_string($value)) {
            throw new RuntimeException(sprintf('Zabbix API option "%s" must be a string.', $key));
        }

        if ('' === trim($value)) {
            throw new RuntimeException($missingMessage);
        }

        return $value;
    }

    /**
     * @param array<string, mixed> $options
     */
    private static function bool(array $options, string $key, bool $default): bool
    {
        if (!array_key_exists($key, $options)) {
            return $default;
        }

        if (!is_bool($options[$key])) {
            throw new RuntimeException(sprintf('Zabbix API option "%s" must be a boolean.', $key));
        }

        return $options[$key];
    }

    /**
     * @param array<string, mixed> $options
     */
    private static function verify(array $options): bool|string
    {
        if (!array_key_exists('verify', $options)) {
            return true;
        }

        $verify = $options['verify'];

        if (!is_bool($verify) && !is_string($verify)) {
            throw new RuntimeException('Zabbix API option "verify" must be a boolean or CA bundle path string.');
        }

        return $verify;
    }

    /**
     * @param array<string, mixed> $options
     */
    private static function number(array $options, string $key, int|float $default): int|float
    {
        if (!array_key_exists($key, $options)) {
            return $default;
        }

        $value = $options[$key];

        if (!is_int($value) && !is_float($value)) {
            throw new RuntimeException(sprintf('Zabbix API option "%s" must be an integer or float.', $key));
        }

        if ($value < 0) {
            throw new RuntimeException(sprintf('Zabbix API option "%s" cannot be negative.', $key));
        }

        return $value;
    }

    /**
     * @param array<string, mixed> $options
     */
    private static function logger(array $options): LoggerInterface
    {
        if (!array_key_exists('logger', $options) || null === $options['logger']) {
            return new NullLogger();
        }

        if (!$options['logger'] instanceof LoggerInterface) {
            throw new RuntimeException(sprintf(
                'Zabbix API option "logger" must implement %s.',
                LoggerInterface::class,
            ));
        }

        return $options['logger'];
    }

    private static function client(
        string $url,
        string $token,
        int|float $connectTimeout,
        bool $debug,
        int|float $timeout,
        bool|string $verify,
        LoggerInterface $logger,
    ): JsonRpcClient {
        $guzzle = new GuzzleClient([
            'base_uri' => $url,
            'connect_timeout' => $connectTimeout,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json-rpc',
                'User-Agent' => 'Idiot/ZabbixApi;Version:' . ZabbixApi::VERSION,
            ],
            'http_errors' => $debug,
            'timeout' => $timeout,
            'verify' => $verify,
        ]);

        return new JsonRpcClient(new HttpClient($guzzle), $logger);
    }
}
