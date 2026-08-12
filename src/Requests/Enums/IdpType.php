<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Type of the authentication protocol used by the identity provider for the user directory. Note that only one user directory of type SAML can exist. Possible values: 1 - User directory of type LDAP; 2 - User directory of type SAML. Required for create operations.
 */
enum IdpType: int
{
    case UserDirectoryOfTypeLdap = 1;
    case UserDirectoryOfTypeSaml = 2;
}
