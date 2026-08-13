<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests;

/**
 * templategroup.massupdate - Replace templates with the specified ones in multiple template groups. All other templates, except the ones mentioned, will be excluded from the given template groups.
 */
final class TemplategroupMassupdateRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'templategroup.massupdate';
    }
}
