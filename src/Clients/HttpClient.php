<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Clients;

use GuzzleHttp\ClientInterface;

final class HttpClient
{
    public function __construct(
        private ClientInterface $client,
    ) {}

    /**
     * @param array<string, mixed>|list<array<string, mixed>> $payload
     */
    public function postJson(array $payload): array
    {
        $response = $this->client->request('POST', '', [
            'json' => $payload,
        ]);

        return json_decode((string)$response->getBody(), true, flags: JSON_THROW_ON_ERROR);
    }
}
