<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

interface SchemaValidator
{
    /**
     * @param array<string,mixed>|list<mixed> $params
     *
     * @return list<string> human-readable violations; an empty list means valid
     */
    public function validate(array $params, RequestSchema $schema): array;
}
