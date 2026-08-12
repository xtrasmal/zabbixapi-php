<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * template.massupdate - Simultaneously replace or remove related objects and update properties on multiple templates.
 */
final class TemplateMassupdateRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'template.massupdate';
    }
}
