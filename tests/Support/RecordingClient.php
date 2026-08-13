<?php

declare(strict_types=1);

namespace Tests\Support;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

/**
 * A recording PSR-18 client for tests.
 *
 * Queues canned responses (raw JSON strings or {@see ResponseInterface} objects),
 * hands them out in order, and records every {@see RequestInterface} it is asked to
 * send so tests can assert on the outgoing envelope.
 */
final class RecordingClient implements ClientInterface
{
    /** @var list<RequestInterface> */
    public array $requests = [];

    /** @var list<ResponseInterface> */
    private array $responses;

    private Psr17Factory $factory;

    /**
     * @param list<ResponseInterface|string> $responses
     */
    public function __construct(array $responses = [])
    {
        $this->factory = new Psr17Factory();
        $this->responses = array_map(
            fn (ResponseInterface|string $response): ResponseInterface => $response instanceof ResponseInterface
                ? $response
                : $this->jsonResponse($response),
            array_values($responses),
        );
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->requests[] = $request;

        if ([] === $this->responses) {
            throw new RuntimeException('RecordingClient has no queued response for the request.');
        }

        return array_shift($this->responses);
    }

    private function jsonResponse(string $body, int $status = 200): ResponseInterface
    {
        return $this->factory
            ->createResponse($status)
            ->withHeader('Content-Type', 'application/json-rpc')
            ->withBody($this->factory->createStream($body));
    }
}
