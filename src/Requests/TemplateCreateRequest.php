<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * template.create - Create new templates.
 */
final class TemplateCreateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'template.create';
    }
}
