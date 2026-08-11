<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * authentication.update - Update existing authentication settings. Only available to Super admin user type. There is a single, singleton Authentication object (no ID field); pass any subset of its properties to update.
 */
final class AuthenticationUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public ?Enums\AuthenticationType $authentication_type = null,
        public ?Enums\HttpAuthEnabled $http_auth_enabled = null,
        public ?Enums\HttpLoginForm $http_login_form = null,
        public ?string $http_strip_domains = null,
        public ?Enums\HttpCaseSensitive $http_case_sensitive = null,
        public ?Enums\LdapAuthEnabled $ldap_auth_enabled = null,
        public ?Enums\LdapCaseSensitive $ldap_case_sensitive = null,
        public ?string $ldap_userdirectoryid = null,
        public ?Enums\SamlAuthEnabled $saml_auth_enabled = null,
        public ?Enums\SamlCaseSensitive $saml_case_sensitive = null,
        public ?int $passwd_min_length = null,
        public ?int $passwd_check_rules = null,
        public ?Enums\LdapJitStatus $ldap_jit_status = null,
        public ?Enums\SamlJitStatus $saml_jit_status = null,
        public ?string $jit_provision_interval = null,
        public ?string $disabled_usrgrpid = null,
        public ?Enums\AuthenticationMfaStatus $mfa_status = null,
        public ?string $mfaid = null,
    ) {}

    public function method(): string
    {
        return 'authentication.update';
    }
}
