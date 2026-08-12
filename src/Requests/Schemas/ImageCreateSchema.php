<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class ImageCreateSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for image.create, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/image/image.create',
            'title' => 'image.create',
            'description' => 'Create new images.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/image/create',
            'type' => 'object',
            'properties' => [
                'name' => [
                    'type' => 'string',
                    'description' => 'Name of the image. Required for create operations.',
                ],
                'imagetype' => [
                    'type' => 'integer',
                    'enum' => [
                        1,
                        2,
                    ],
                    'description' => 'Type of image. Possible values: 1 - (default) icon; 2 - background image. This property is constant (cannot be changed after creation) and is required for create operations.',
                ],
                'image' => [
                    'type' => 'string',
                    'description' => 'Base64 encoded image. The maximum size of the encoded image is 1 MB. Maximum size can be adjusted by changing the ZBX_MAX_IMAGE_SIZE constant value. Supported image formats: PNG, JPEG, GIF, and WebP. Required for create operations.',
                ],
            ],
            'required' => [
                'name',
                'imagetype',
                'image',
            ],
            'additionalProperties' => false,
        ];
    }
}
