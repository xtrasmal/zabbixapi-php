<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * dcheck.get - Retrieve discovery checks according to the given parameters.
 */
final class DcheckGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'dcheck.get';
    }
}
