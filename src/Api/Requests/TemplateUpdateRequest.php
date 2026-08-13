<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * template.update - Update existing templates.
 */
final class TemplateUpdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'template.update';
    }
}
