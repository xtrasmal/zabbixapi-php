<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * template.get - Retrieve templates according to the given parameters.
 */
final class TemplateGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'template.get';
    }
}
