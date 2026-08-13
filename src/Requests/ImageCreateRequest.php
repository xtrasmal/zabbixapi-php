<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * image.create - Create new images.
 */
final class ImageCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'image.create';
    }
}
