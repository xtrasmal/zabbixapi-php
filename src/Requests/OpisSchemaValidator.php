<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

use Opis\JsonSchema\Errors\ErrorFormatter;
use Opis\JsonSchema\Helper;
use Opis\JsonSchema\Validator;

/**
 * SchemaValidator backed by opis/json-schema. The compiled PHP array is handed
 * to opis via Helper::toJSON (array -> stdClass), never json_decode.
 */
final class OpisSchemaValidator implements SchemaValidator
{
    public function validate(array $params, RequestSchema $schema): array
    {
        $definition = $schema->definition();

        // opis needs the JSON data model (stdClass for objects), which
        // Helper::toJSON provides — except for the empty array, which stays []
        // and would fail an object schema. An all-optional object-request ("get
        // all hosts") is that case, so hand opis an empty object when the schema
        // root is an object. This stdClass is a transient fed straight into
        // opis; it is never returned from our API.
        $data = $params === [] && ($definition['type'] ?? null) === 'object'
            ? new \stdClass()
            : Helper::toJSON($params);

        $result = (new Validator())->validate(
            $data,
            Helper::toJSON($definition),
        );

        if ($result->isValid()) {
            return [];
        }

        $error = $result->error();
        $violations = [];
        foreach ((new ErrorFormatter())->formatKeyed($error) as $pointer => $messages) {
            foreach ((array) $messages as $message) {
                $violations[] = ($pointer === '' ? '(root)' : $pointer) . ': ' . $message;
            }
        }

        return $violations !== [] ? $violations : [$error->message()];
    }
}
