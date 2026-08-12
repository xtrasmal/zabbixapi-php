<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether SCIM provisioning for SAML is enabled or disabled. Possible values: 0 - (default) SCIM provisioning is disabled; 1 - SCIM provisioning is enabled. Supported if idp_type is set to "User directory of type SAML".
 */
enum ScimStatus: int
{
    case ScimProvisioningIsDisabled = 0;
    case ScimProvisioningIsEnabled = 1;
}
