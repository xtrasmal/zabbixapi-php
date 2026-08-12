<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Clients;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Idiot\Zabbix\ZabbixApi;
use Idiot\Zabbix\ZabbixApiException;
use JsonException;

/**
 * @phpstan-type JsonRpcScalar array|bool|float|int|string|null
 * @phpstan-type JsonRpcPayload array<string, JsonRpcScalar>|list<JsonRpcScalar>
 */
final class HttpClient
{
    private array $options;

    public function __construct(private ?ClientInterface $client = null, array $options = [])
    {
        $this->options = self::mergeOptions($options);
    }

    public function configure(array $options = []): self
    {
        $this->options = self::mergeOptions($options);

        return $this;
    }

    public function options(): array
    {
        return $this->options;
    }

    /**
     * @throws ZabbixApiException
     *
     * @return JsonRpcPayload
     */
    public function postJsonRpc(string $url, string $body, ?string $bearerToken = null): array
    {
        $options = $this->options;
        $headers = array_replace($options['headers'] ?? [], [
            'Content-Type' => 'application/json-rpc',
            'User-Agent' => 'Idiot/ZabbixApi;Version:' . ZabbixApi::VERSION,
        ]);

        if (null !== $bearerToken) {
            $headers['Authorization'] = 'Bearer ' . $bearerToken;
        }

        $options['headers'] = $headers;
        $options['body'] = $body;
        $options['http_errors'] = false;

        try {
            $response = $this->client()->request('POST', $url, $options);
        } catch (GuzzleException $e) {
            throw new ZabbixApiException(
                message: 'Request failed: ' . $e->getMessage(),
                code: $e->getCode() > 0 ? $e->getCode() : 0,
                previous: $e,
            );
        }

        $httpCode = $response->getStatusCode();

        if ($httpCode >= 400) {
            throw new ZabbixApiException(
                message: "Request failed with HTTP-Code: $httpCode. " . $response->getReasonPhrase(),
                code: $httpCode,
            );
        }

        try {
            $decoded = json_decode((string)$response->getBody(), true, flags: JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new ZabbixApiException(
                message: 'Invalid JSON response: ' . $e->getMessage(),
                code: ZabbixApi::EXCEPTION_CLASS_CODE,
                previous: $e,
            );
        }

        if (!is_array($decoded)) {
            throw new ZabbixApiException(
                message: 'JSON-RPC response must be a JSON object or batch array.',
                code: ZabbixApi::EXCEPTION_CLASS_CODE,
            );
        }

        return $decoded;
    }

    public static function defaultOptions(): array
    {
        return [
            'allow_redirects' => true,
            'decode_content' => true,
            'timeout' => ZabbixApi::DEFAULT_TIMEOUT,
            'connect_timeout' => ZabbixApi::DEFAULT_CONNECTION_TIMEOUT,
            'verify' => true,
        ];
    }

    public static function mergeOptions(array $options = []): array
    {
        $merged = self::defaultOptions();

        foreach ($options as $key => $value) {
            $merged[$key] = $value;
        }

        return $merged;
    }

    private function client(): ClientInterface
    {
        return $this->client ??= new GuzzleClient();
    }
}
