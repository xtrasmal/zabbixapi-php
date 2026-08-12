<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class TemplategroupDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<TemplategroupId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'templategroup.delete';
    }
}
