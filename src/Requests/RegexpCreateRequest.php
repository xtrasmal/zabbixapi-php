<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * regexp.create - Create new global regular expressions.
 */
final class RegexpCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'regexp.create';
    }
}
