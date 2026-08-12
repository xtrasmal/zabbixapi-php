<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

final class MfaDeleteRequest extends AbstractZabbixRequest
{
    /** @param list<MfaId> $ids */
    public function __construct(array $ids)
    {
        parent::__construct($ids);
    }

    public function method(): string
    {
        return 'mfa.delete';
    }
}
