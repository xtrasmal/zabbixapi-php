<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * image.get - Retrieve images according to the given parameters.
 */
final class ImageGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'image.get';
    }
}
