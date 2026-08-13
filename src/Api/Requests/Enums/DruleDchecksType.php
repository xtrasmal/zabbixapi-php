<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Type of check. Possible values: 0 - SSH; 1 - LDAP; 2 - SMTP; 3 - FTP; 4 - HTTP; 5 - POP; 6 - NNTP; 7 - IMAP; 8 - TCP; 9 - Zabbix agent; 10 - SNMPv1 agent; 11 - SNMPv2 agent; 12 - ICMP ping; 13 - SNMPv3 agent; 14 - HTTPS; 15 - Telnet. Property behavior: required.
 */
enum DruleDchecksType: int
{
    case Ssh = 0;
    case Ldap = 1;
    case Smtp = 2;
    case Ftp = 3;
    case Http = 4;
    case Pop = 5;
    case Nntp = 6;
    case Imap = 7;
    case Tcp = 8;
    case ZabbixAgent = 9;
    case Snmpv1Agent = 10;
    case Snmpv2Agent = 11;
    case IcmpPing = 12;
    case Snmpv3Agent = 13;
    case Https = 14;
    case Telnet = 15;
}
