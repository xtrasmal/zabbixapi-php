<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use RuntimeException;

final class InvalidZabbixRequest extends RuntimeException
{
    /** @param list<string> $violations */
    public static function fromViolations(string $method, array $violations): self
    {
        return new self(sprintf(
            "Invalid params for '%s':\n  - %s",
            $method,
            implode("\n  - ", $violations),
        ));
    }
}
