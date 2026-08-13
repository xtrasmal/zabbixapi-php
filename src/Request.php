<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

interface Request
{
    /**
     * Method name for the request, e.g. "host.get".
     * @return string
     */
    public function method(): string;

    /**
     * Parameters for the request.
     * @return array<string,mixed>
     */
    public function params(): array;
}
