<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class TemplateDeleteRequest extends AbstractZabbixListRequest
{
    /** @param list<TemplateId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public static function method(): string
    {
        return 'template.delete';
    }
}
