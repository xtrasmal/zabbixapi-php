<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

use RuntimeException;

final class InvalidZabbixRequest extends RuntimeException
{
    /** @var list<string> */
    private array $violations = [];

    /** @return list<string> */
    public function violations(): array
    {
        return $this->violations;
    }

    /** @param list<string> $violations */
    public static function fromViolations(string $method, array $violations): self
    {
        $exception = new self(sprintf(
            "Invalid params for '%s':\n  - %s",
            $method,
            implode("\n  - ", $violations),
        ));
        $exception->violations = $violations;

        return $exception;
    }
}
