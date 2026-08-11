<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * image.update - Update existing images.
 */
final class ImageUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $imageid,
        public ?string $name = null,
        public ?Enums\ImageImagetype $imagetype = null,
        public ?string $image = null,
    ) {}

    public function method(): string
    {
        return 'image.update';
    }
}
