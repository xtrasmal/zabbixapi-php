<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * template.update - Update existing templates.
 */
final class TemplateUpdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'template.update';
    }
}
