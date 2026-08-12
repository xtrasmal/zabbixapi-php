<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * template.massadd - Simultaneously add multiple related objects to the given templates.
 */
final class TemplateMassaddRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'template.massadd';
    }
}
