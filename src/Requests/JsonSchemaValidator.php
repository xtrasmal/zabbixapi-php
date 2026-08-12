<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

use JsonSchema\Validator;

/**
 * SchemaValidator backed by justinrainbow/json-schema.
 */
final class JsonSchemaValidator implements SchemaValidator
{
    public function validate(array $params, RequestSchema $schema): array
    {
        $definition = $schema->definition();
        $data = [] === $params && !$schema->paramsAreList()
            ? new \stdClass()
            : $this->toJsonModel($params);
        $schemaObject = $this->toJsonModel($definition);

        $validator = new Validator();
        $validator->validate($data, $schemaObject);

        if ($validator->isValid()) {
            return [];
        }

        return array_map(
            static fn (array $error): string => sprintf(
                '%s: %s',
                '' === $error['property'] ? '(root)' : $error['property'],
                $error['message'],
            ),
            $validator->getErrors(),
        );
    }

    private function toJsonModel(mixed $value): mixed
    {
        return json_decode(json_encode($value, JSON_THROW_ON_ERROR), false, flags: JSON_THROW_ON_ERROR);
    }
}
