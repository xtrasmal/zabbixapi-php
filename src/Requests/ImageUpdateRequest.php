<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * image.update - Update existing images.
 */
final class ImageUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'image.update';
    }
}
