<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * problem.get - Retrieve unresolved problems (and, if requested, recently resolved ones) according to the given parameters.
 */
final class ProblemGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'problem.get';
    }
}
