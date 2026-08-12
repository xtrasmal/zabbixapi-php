<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class TemplateDeleteRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'template.delete';
    }
}
