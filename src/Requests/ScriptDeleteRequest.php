<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class ScriptDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<ScriptId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'script.delete';
    }
}
