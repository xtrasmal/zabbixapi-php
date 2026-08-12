<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * Validates a request's params against its Zabbix schema before it leaves the
 * client. If Zabbix ever returns an input-shape validation error, this gate
 * failed to do its job.
 */
final class ZabbixRequestValidator
{
    public function __construct(
        private ZabbixSchemaProvider $schemaProvider,
        private SchemaValidator $validator,
    ) {}

    public function validate(ZabbixRequest $request): void
    {
        $schema = $this->schemaProvider->schemaFor($request->method());
        $violations = $this->validator->validate($request->params(), $schema);

        if ([] !== $violations) {
            throw InvalidZabbixRequest::fromViolations($request->method(), $violations);
        }
    }

    public static function createDefault(): self
    {
        return new self(
            new JsonFileSchemaProvider(),
            new JsonSchemaValidator(),
        );
    }
}
