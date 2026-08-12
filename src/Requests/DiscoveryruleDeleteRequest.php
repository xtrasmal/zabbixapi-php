<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class DiscoveryruleDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<DiscoveryruleId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'discoveryrule.delete';
    }
}
