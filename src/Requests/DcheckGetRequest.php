<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * dcheck.get - Retrieve discovery checks according to the given parameters.
 */
final class DcheckGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'dcheck.get';
    }
}
