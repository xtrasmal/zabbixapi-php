<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Clients;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

final class HttpClient
{
    private array $options;
    private ClientInterface $client;
    private RequestFactoryInterface $requestFactory;
    private StreamFactoryInterface $streamFactory;

    public function __construct(
        array $options = [],
        ?ClientInterface $client = null,
        ?RequestFactoryInterface $requestFactory = null,
        ?StreamFactoryInterface $streamFactory = null,
    ) {
        $this->options = array_merge([
            'url' => '',
            'token' => '',
            'verify' => true,
            'timeout' => 30,
            'connect_timeout' => 10,
            'headers' => [
                'User-Agent' => 'Idiot-Zabbix-Client/1.0',
                'Content-Type' => 'application/json-rpc',
                'Accept' => 'application/json',
                'Accept-Encoding' => 'gzip, deflate',
            ],
        ], $options);
        // Auto-discover whatever PSR-18 implementation is installed (Guzzle, Symfony, etc.)
        $this->client = $client ?? Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?? Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory ?? Psr17FactoryDiscovery::findStreamFactory();
    }

    /**
     * @param array<string, mixed>|list<array<string, mixed>> $payload
     *
     * @throws ClientExceptionInterface
     * @throws JsonException
     */
    public function postJson(array $payload): array
    {
        // 1. Create the base POST request (The URI '' comes from your original code)
        $request = $this->requestFactory->createRequest('POST', $this->options['url']);

        foreach ($this->options['headers'] ?? [] as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        if (!empty($this->options['token'])) {
            $request = $request->withHeader('Authorization', 'Bearer ' . $this->options['token']);
        }

        // 2. Stream the JSON payload into the request body
        $jsonString = json_encode($payload, JSON_THROW_ON_ERROR);
        $body = $this->streamFactory->createStream($jsonString);
        $request = $request->withBody($body);

        // 3. Send via PSR-18 client
        $response = $this->client->sendRequest($request);

        return json_decode((string)$response->getBody(), true, flags: JSON_THROW_ON_ERROR);
    }
}
