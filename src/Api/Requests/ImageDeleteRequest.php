<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

final class ImageDeleteRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'image.delete';
    }
}
