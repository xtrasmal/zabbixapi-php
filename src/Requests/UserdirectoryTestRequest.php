<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * userdirectory.test - Test user directory connection settings. Also allows testing what configured data matches the user directory settings for user provisioning (e.g., what user role, user groups, user medias will be assigned to the user); for this type of test the request should be made for a user directory that has provision_status set to enabled. Since userdirectory.get does not return the bind_password field, userdirectoryid and/or bind_password should be supplied.
 */
final class UserdirectoryTestRequest extends AbstractZabbixRequest
{
    public function __construct(
        public ?string $userdirectoryid = null,
        public ?Enums\IdpType $idp_type = null,
        public ?string $group_name = null,
        public ?string $user_username = null,
        public ?string $user_lastname = null,
        public ?Enums\ProvisionStatus $provision_status = null,
        public ?array $provision_groups = null,
        public ?array $provision_media = null,
        public ?string $name = null,
        public ?string $host = null,
        public ?int $port = null,
        public ?string $base_dn = null,
        public ?string $search_attribute = null,
        public ?string $bind_dn = null,
        public ?string $bind_password = null,
        public ?string $description = null,
        public ?string $group_basedn = null,
        public ?string $group_filter = null,
        public ?string $group_member = null,
        public ?string $group_membership = null,
        public ?string $search_filter = null,
        public ?Enums\StartTls $start_tls = null,
        public ?string $user_ref_attr = null,
        public ?string $idp_entityid = null,
        public ?string $sp_entityid = null,
        public ?string $username_attribute = null,
        public ?string $sso_url = null,
        public ?string $slo_url = null,
        public ?Enums\EncryptNameid $encrypt_nameid = null,
        public ?Enums\EncryptAssertions $encrypt_assertions = null,
        public ?string $nameid_format = null,
        public ?Enums\ScimStatus $scim_status = null,
        public ?Enums\SignAssertions $sign_assertions = null,
        public ?Enums\SignAuthnRequests $sign_authn_requests = null,
        public ?Enums\SignMessages $sign_messages = null,
        public ?Enums\SignLogoutRequests $sign_logout_requests = null,
        public ?Enums\SignLogoutResponses $sign_logout_responses = null,
        public ?string $test_username = null,
        public ?string $test_password = null,
    ) {}

    public function method(): string
    {
        return 'userdirectory.test';
    }
}
