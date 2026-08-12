<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * SMTP connection security level to use.  Possible values: 0 - (default) None; 1 - STARTTLS; 2 - SSL/TLS.  Property behavior: - supported if type is set to "Email"
 */
enum SmtpSecurity: int
{
    case None = 0;
    case Starttls = 1;
    case SslTls = 2;
}
