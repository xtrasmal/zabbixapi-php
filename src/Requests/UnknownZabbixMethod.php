<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

final class UnknownZabbixMethod extends \RuntimeException
{
    public static function method(string $method): self
    {
        return new self("No schema registered for Zabbix method '{$method}'.");
    }
}
