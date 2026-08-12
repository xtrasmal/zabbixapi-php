<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ModuleDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<ModuleId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'module.delete';
    }
}
