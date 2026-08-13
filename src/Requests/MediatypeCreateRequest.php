<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * mediatype.create - Create new media types.
 */
final class MediatypeCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'mediatype.create';
    }
}
