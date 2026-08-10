<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * SSL verify host for SMTP.  Possible values: 0 - (default) No; 1 - Yes.  Property behavior: - supported if smtp_security is set to "STARTTLS" or "SSL/TLS"
 */
enum SmtpVerifyHost: int
{
    case No = 0;
    case Yes = 1;
}
