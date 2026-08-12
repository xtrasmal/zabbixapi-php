<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * template.massremove - Remove related objects from multiple templates.
 */
final class TemplateMassremoveRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'template.massremove';
    }
}
