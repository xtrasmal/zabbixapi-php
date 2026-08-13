<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * template.create - Create new templates.
 */
final class TemplateCreateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'template.create';
    }
}
