<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class MediatypeDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<MediatypeId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'mediatype.delete';
    }
}
