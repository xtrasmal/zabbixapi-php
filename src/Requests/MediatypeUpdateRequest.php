<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * mediatype.update - Update existing media types.
 */
final class MediatypeUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'mediatype.update';
    }
}
