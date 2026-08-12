<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Type of the item.  Possible values: 0 - Zabbix agent; 2 - Zabbix trapper; 3 - Simple check; 5 - Zabbix internal; 7 - Zabbix agent (active); 9 - Web item; 10 - External check; 11 - Database monitor; 12 - IPMI agent; 13 - SSH agent; 14 - TELNET agent; 15 - Calculated; 16 - JMX agent; 17 - SNMP trap; 18 - Dependent item; 19 - HTTP agent; 20 - SNMP agent; 21 - Script; 22 - Browser.  Property behavior: - required for create operations - read-only for inherited objects or discovered objects
 */
enum ItemType: int
{
    case ZabbixAgent = 0;
    case ZabbixTrapper = 2;
    case SimpleCheck = 3;
    case ZabbixInternal = 5;
    case ZabbixAgentActive = 7;
    case WebItem = 9;
    case ExternalCheck = 10;
    case DatabaseMonitor = 11;
    case IpmiAgent = 12;
    case SshAgent = 13;
    case TelnetAgent = 14;
    case Calculated = 15;
    case JmxAgent = 16;
    case SnmpTrap = 17;
    case DependentItem = 18;
    case HttpAgent = 19;
    case SnmpAgent = 20;
    case Script = 21;
    case Browser = 22;
}
