<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Whether the SAML name ID should be encrypted. Possible values: 0 - (default) Do not encrypt name ID; 1 - Encrypt name ID. Supported if idp_type is set to "User directory of type SAML".
 */
enum EncryptNameid: int
{
    case DoNotEncryptNameId = 0;
    case EncryptNameId = 1;
}
