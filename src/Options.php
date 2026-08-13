<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use Idiot\Zabbix\Clients\JsonRpcClient;
use Psr\Log\NullLogger;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class Options
{
    public const DEFAULT_TIMEOUT = 30;
    public const DEFAULT_CONNECTION_TIMEOUT = 10;

    private function __construct(public ?array $options = null)
    {
        $this->options = $this->resolveOptions($options ?? []);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'url' => null,
            'token' => null,
            'debug' => false,
            'verify' => true,
            'timeout' => self::DEFAULT_TIMEOUT,
            'connect_timeout' => self::DEFAULT_CONNECTION_TIMEOUT,
            'logger' => new NullLogger(),
            'client' => null,
        ]);
    }

    /**
     * @param array<string, mixed> $options
     */
    public static function fromArray(array $options): self
    {
        return new self(options: $options);
    }

    private function resolveOptions(array $options): array
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        return $resolver->resolve($options);
    }

    private static function client(array $options): JsonRpcClient
    {
        return new JsonRpcClient($options['client'], $options['logger']);
    }
}
