<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * image.create - Create new images.
 */
final class ImageCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public Enums\ImageImagetype $imagetype,
        public string $image,
    ) {}

    public function method(): string
    {
        return 'image.create';
    }
}
