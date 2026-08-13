<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * SSL verify peer for SMTP.  Possible values: 0 - (default) No; 1 - Yes.  Property behavior: - supported if smtp_security is set to "STARTTLS" or "SSL/TLS"
 */
enum SmtpVerifyPeer: int
{
    case No = 0;
    case Yes = 1;
}
