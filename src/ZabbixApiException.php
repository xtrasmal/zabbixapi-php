<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use Exception;
use Throwable;

class ZabbixApiException extends Exception
{
    public const CLIENT_ERROR = 1000;

    public function __construct(string $message, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
