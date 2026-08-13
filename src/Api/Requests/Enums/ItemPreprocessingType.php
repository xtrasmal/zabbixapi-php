<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * The preprocessing option type.  Possible values: 1 - Custom multiplier; 2 - Right trim; 3 - Left trim; 4 - Trim; 5 - Regular expression; 6 - Boolean to decimal; 7 - Octal to decimal; 8 - Hexadecimal to decimal; 9 - Simple change; 10 - Change per second; 11 - XML XPath; 12 - JSONPath; 13 - In range; 14 - Matches regular expression; 15 - Does not match regular expression; 16 - Check for error in JSON; 17 - Check for error in XML; 18 - Check for error using regular expression; 19 - Discard unchanged; 20 - Discard unchanged with heartbeat; 21 - JavaScript; 22 - Prometheus pattern; 23 - Prometheus to JSON; 24 - CSV to JSON; 25 - Replace; 26 - Check unsupported; 27 - XML to JSON; 28 - SNMP walk value; 29 - SNMP walk to JSON; 30 - SNMP get value.  Property behavior: - required
 */
enum ItemPreprocessingType: int
{
    case CustomMultiplier = 1;
    case RightTrim = 2;
    case LeftTrim = 3;
    case Trim = 4;
    case RegularExpression = 5;
    case BooleanToDecimal = 6;
    case OctalToDecimal = 7;
    case HexadecimalToDecimal = 8;
    case SimpleChange = 9;
    case ChangePerSecond = 10;
    case XmlXpath = 11;
    case Jsonpath = 12;
    case InRange = 13;
    case MatchesRegularExpression = 14;
    case DoesNotMatchRegularExpression = 15;
    case CheckForErrorInJson = 16;
    case CheckForErrorInXml = 17;
    case CheckForErrorUsingRegular = 18;
    case DiscardUnchanged = 19;
    case DiscardUnchangedWithHeartbeat = 20;
    case Javascript = 21;
    case PrometheusPattern = 22;
    case PrometheusToJson = 23;
    case CsvToJson = 24;
    case Replace = 25;
    case CheckUnsupported = 26;
    case XmlToJson = 27;
    case SnmpWalkValue = 28;
    case SnmpWalkToJson = 29;
    case SnmpGetValue = 30;
}
