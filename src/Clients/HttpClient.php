<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Clients;

use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class HttpClient implements ClientInterface
{
    private ClientInterface $client;

    public function __construct(?ClientInterface $client = null)
    {
        // Auto-discover whatever PSR-18 implementation is installed (Guzzle, Symfony, etc.)
        $this->client = $client ?? Psr18ClientDiscovery::find();
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->client->sendRequest($request);
    }
}
