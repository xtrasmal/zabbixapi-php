<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * problem.get - Retrieve unresolved problems (and, if requested, recently resolved ones) according to the given parameters.
 */
final class ProblemGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'problem.get';
    }
}
