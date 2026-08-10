<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class ImageUpdateSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for image.update, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/image/image.update',
            'title' => 'image.update',
            'description' => 'Update existing images.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/image/update',
            'type' => 'object',
            'properties' => [
                'imageid' => [
                    'type' => 'string',
                    'description' => 'ID of the image. Read-only; required for update operations.',
                ],
                'name' => [
                    'type' => 'string',
                    'description' => 'Name of the image.',
                ],
                'imagetype' => [
                    'type' => 'integer',
                    'enum' => [
                        1,
                        2,
                    ],
                    'description' => 'Type of image. Possible values: 1 - (default) icon; 2 - background image. This property is constant and cannot be changed after creation.',
                ],
                'image' => [
                    'type' => 'string',
                    'description' => 'Base64 encoded image. The maximum size of the encoded image is 1 MB. Maximum size can be adjusted by changing the ZBX_MAX_IMAGE_SIZE constant value. Supported image formats: PNG, JPEG, GIF, and WebP.',
                ],
            ],
            'required' => [
                'imageid',
            ],
            'additionalProperties' => false,
        ];
    }
}
