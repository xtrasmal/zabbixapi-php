<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * image.get - Retrieve images according to the given parameters.
 */
final class ImageGetRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'image.get';
    }
}
