<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * IPMI authentication algorithm. Possible values: -1 - (default) default; 0 - none; 1 - MD2; 2 - MD5; 4 - straight; 5 - OEM; 6 - RMCP+.
 */
enum IpmiAuthtype: int
{
    case Default = -1;
    case None = 0;
    case Md2 = 1;
    case Md5 = 2;
    case Straight = 4;
    case Oem = 5;
    case RmcpPlus = 6;
}
