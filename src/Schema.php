<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

interface Schema
{
    /**
     * Method name for the schema, e.g. "host.get".
     *
     * @return string
     */
    public function method(): string;

    /**
     * Schema definition for the method, as loaded from the bundled versioned schema files.
     *
     * @return array<string,mixed>
     */
    public function definition(): array;
}
