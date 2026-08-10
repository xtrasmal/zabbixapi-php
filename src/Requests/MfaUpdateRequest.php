<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * mfa.update - Update existing MFA methods.
 */
final class MfaUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $mfaid,
        public ?Enums\MfaType $type = null,
        public ?string $name = null,
        public ?Enums\HashFunction $hash_function = null,
        public ?Enums\CodeLength $code_length = null,
        public ?string $api_hostname = null,
        public ?string $clientid = null,
        public ?string $client_secret = null,
    ) {}

    public static function method(): string
    {
        return 'mfa.update';
    }
}
