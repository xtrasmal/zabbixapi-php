<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class MediatypeDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<MediatypeId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'mediatype.delete';
    }
}
