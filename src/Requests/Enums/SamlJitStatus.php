<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Status of SAML provisioning. Possible values: 0 - Disabled for configured SAML IdPs; 1 - Enabled for configured SAML IdPs.
 */
enum SamlJitStatus: int
{
    case DisabledForConfiguredSamlIdps = 0;
    case EnabledForConfiguredSamlIdps = 1;
}
