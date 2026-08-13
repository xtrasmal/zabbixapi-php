<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use Idiot\Zabbix\Request;

/**
 * Validates a request's params against its Zabbix schema before it leaves the
 * client. If Zabbix ever returns an input-shape validation error, this gate
 * failed to do its job.
 */
final class ZabbixRequestValidator
{
    public function __construct(
        private readonly SchemaProvider  $schemaProvider,
        private readonly SchemaValidator $validator,
    ) {}

    public function validate(Request $request): void
    {
        $schema = $this->schemaProvider->schemaFor($request);
        $violations = $this->validator->validate($request->params(), $schema);

        if ([] !== $violations) {
            throw InvalidZabbixRequest::fromViolations($request->method(), $violations);
        }
    }

    public static function createDefault(): self
    {
        return new self(
            new JSONSchemaProvider(),
            new JSONSchemaValidator(),
        );
    }
}
