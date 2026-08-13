<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use Idiot\Zabbix\Requests\ZabbixRequest;
use RuntimeException;

/**
 * Loads bundled Zabbix JSON schemas by method name.
 */
final class JsonFileSchemaProvider implements ZabbixSchemaProvider
{
    private const METHOD_PATTERN = '/\A[a-z][a-z0-9]*\.[A-Za-z0-9.]+\z/';

    private string $schemaDirectory;
    private RequestRegistry $requestRegistry;

    /** @var array<string, RequestSchema> */
    private array $schemas = [];

    public function __construct(
        ?string $schemaDirectory = null,
        ?RequestRegistry $requestRegistry = null,
    ) {
        $this->schemaDirectory = rtrim($schemaDirectory ?? dirname(__DIR__) . '/schemas/7.0', '/');
        $this->requestRegistry = $requestRegistry ?? new RequestRegistry();
    }

    public function schemaFor(ZabbixRequest $request): RequestSchema
    {
        $this->requestRegistry->requestClassFor($request);
        $method = $request->method();

        return $this->schemas[$method] ??= $this->loadSchema($method);
    }

    private function loadSchema(string $method): RequestSchema
    {
        if (1 !== preg_match(self::METHOD_PATTERN, $method)) {
            throw UnknownZabbixMethod::method($method);
        }

        $apiObject = strstr($method, '.', true);
        if (false === $apiObject) {
            throw UnknownZabbixMethod::method($method);
        }

        $path = sprintf('%s/%s/%s.json', $this->schemaDirectory, $apiObject, $method);
        if (!is_file($path)) {
            throw UnknownZabbixMethod::method($method);
        }

        $contents = file_get_contents($path);
        if (false === $contents) {
            throw new RuntimeException(sprintf('Unable to read schema file %s.', $path));
        }

        $definition = json_decode($contents, true, flags: JSON_THROW_ON_ERROR);
        if (!is_array($definition)) {
            throw new RuntimeException(sprintf('Schema file %s did not decode to an object.', $path));
        }

        if (($definition['title'] ?? null) !== $method) {
            throw new RuntimeException(sprintf('Schema file %s does not describe %s.', $path, $method));
        }

        /** @var array<string, mixed> $definition */
        return new RequestSchema($method, $definition);
    }
}
