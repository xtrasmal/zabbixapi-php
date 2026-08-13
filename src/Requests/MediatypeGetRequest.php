<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * mediatype.get - Retrieve media types according to the given parameters.
 */
final class MediatypeGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'mediatype.get';
    }
}
