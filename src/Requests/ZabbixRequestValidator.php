<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

use Idiot\Zabbix\Requests\Schemas\StaticSchemaRegistry;

/**
 * Validates a request's params against its compiled schema before it leaves the
 * client. If Zabbix ever returns an input-shape validation error, this gate
 * failed to do its job.
 */
final class ZabbixRequestValidator
{
    public function __construct(
        private ZabbixRequestSchemaRegistry $registry,
        private SchemaValidator $validator,
    ) {}

    public function validate(ZabbixRequest $request): void
    {
        $schema = $this->registry->schemaFor($request->method());
        $violations = $this->validator->validate($request->params(), $schema);

        if ([] !== $violations) {
            throw InvalidZabbixRequest::fromViolations($request->method(), $violations);
        }
    }

    public static function createDefault(): self
    {
        return new self(
            new StaticSchemaRegistry(),
            new OpisSchemaValidator(),
        );
    }
}
