<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use Idiot\Zabbix\Requests\UserLoginRequest;

final class ZabbixApiOptions
{
    /**
     * @param array<string, mixed> $http
     */
    private function __construct(
        public readonly ?string $url,
        public readonly ?string $token,
        public readonly ?UserLoginRequest $login,
        public readonly array $http,
    ) {}

    /**
     * @param array<string, mixed> $options
     */
    public static function fromArray(array $options): self
    {
        $url = self::optionalString($options, 'url');
        $token = self::optionalString($options, 'token');
        $username = self::optionalString($options, 'username');
        $password = self::optionalString($options, 'password');
        $http = self::httpOptions($options);

        if (null === $url && null !== $token) {
            throw new ZabbixApiException(
                'Zabbix API token cannot be configured without a Zabbix URL.',
                ZabbixApi::EXCEPTION_CLASS_CODE_AUTH,
            );
        }

        if ((null === $username) !== (null === $password)) {
            throw new ZabbixApiException(
                'Zabbix API username and password must be configured together.',
                ZabbixApi::EXCEPTION_CLASS_CODE_AUTH,
            );
        }

        if (null === $url && null !== $username) {
            throw new ZabbixApiException(
                'Zabbix API login cannot be configured without a Zabbix URL.',
                ZabbixApi::EXCEPTION_CLASS_CODE_AUTH,
            );
        }

        return new self(
            url: $url,
            token: $token,
            login: null === $username ? null : new UserLoginRequest($username, $password),
            http: $http,
        );
    }

    /**
     * @param array<string, mixed> $options
     */
    private static function optionalString(array $options, string $key): ?string
    {
        if (!array_key_exists($key, $options)) {
            return null;
        }

        $value = $options[$key];

        if (null === $value) {
            return null;
        }

        if (!is_string($value)) {
            throw new ZabbixApiException(
                sprintf('Zabbix API option "%s" must be a string.', $key),
                ZabbixApi::EXCEPTION_CLASS_CODE,
            );
        }

        return $value;
    }

    /**
     * @param array<string, mixed> $options
     *
     * @return array<string, mixed>
     */
    private static function httpOptions(array $options): array
    {
        $http = $options['http'] ?? [];

        if (!is_array($http)) {
            throw new ZabbixApiException(
                'Zabbix API option "http" must be an array of Guzzle request options.',
                ZabbixApi::EXCEPTION_CLASS_CODE,
            );
        }

        unset($options['url'], $options['token'], $options['username'], $options['password'], $options['http']);

        return array_replace($options, $http);
    }
}
