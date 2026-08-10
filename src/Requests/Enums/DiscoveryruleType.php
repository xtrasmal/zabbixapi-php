<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Type of the LLD rule. Possible values: 0 - Zabbix agent; 2 - Zabbix trapper; 3 - Simple check; 5 - Zabbix internal; 7 - Zabbix agent (active); 10 - External check; 11 - Database monitor; 12 - IPMI agent; 13 - SSH agent; 14 - TELNET agent; 16 - JMX agent; 18 - Dependent item; 19 - HTTP agent; 20 - SNMP agent; 21 - Script; 22 - Browser. Property behavior: required for create operations; read-only for inherited objects.
 */
enum DiscoveryruleType: int
{
    case ZabbixAgent = 0;
    case ZabbixTrapper = 2;
    case SimpleCheck = 3;
    case ZabbixInternal = 5;
    case ZabbixAgentActive = 7;
    case ExternalCheck = 10;
    case DatabaseMonitor = 11;
    case IpmiAgent = 12;
    case SshAgent = 13;
    case TelnetAgent = 14;
    case JmxAgent = 16;
    case DependentItem = 18;
    case HttpAgent = 19;
    case SnmpAgent = 20;
    case Script = 21;
    case Browser = 22;
}
