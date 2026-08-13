<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Action type used in case of preprocessing step failure. Possible values: 0 - Error message is set by Zabbix server; 1 - Discard value; 2 - Set custom value; 3 - Set custom error message. Property behavior: required if type is set to "Regular expression" (5), "XML XPath" (11), "JSONPath" (12), "Matches regular expression" (14), "Does not match regular expression" (15), "Check for error in JSON" (16), "Check for error in XML" (17), "Prometheus to JSON" (23), "CSV to JSON" (24), "XML to JSON" (27), "SNMP walk value" (28), "SNMP walk to JSON" (29), or "SNMP get value" (30).
 */
enum ErrorHandler: int
{
    case ErrorMessageIsSetBy = 0;
    case DiscardValue = 1;
    case SetCustomValue = 2;
    case SetCustomErrorMessage = 3;
}
