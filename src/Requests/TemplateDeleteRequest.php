<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class TemplateDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<TemplateId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'template.delete';
    }
}
