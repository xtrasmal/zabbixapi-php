<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * discoveryrule.copy - Copy LLD rules with all of the prototypes to the given hosts. Deprecated: configure LLD rules on templates and link the templates to other templates/hosts instead.
 */
final class DiscoveryruleCopyRequest extends AbstractZabbixRequest
{
    public function method(): string
    {
        return 'discoveryrule.copy';
    }
}
