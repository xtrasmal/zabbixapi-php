<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use Psr\Log\NullLogger;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class Options
{
    public const DEFAULT_TIMEOUT = 30;
    public const DEFAULT_CONNECTION_TIMEOUT = 10;

    private array $defaultOptions = [];

    private function __construct(public ?array $options = null)
    {
        $this->options = $this->resolveOptions($options ?? []);
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

        return $resolver->resolve($options);
    }
}
