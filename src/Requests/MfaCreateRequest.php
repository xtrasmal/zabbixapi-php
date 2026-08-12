<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * mfa.create - Create new MFA methods.
 */
final class MfaCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public ?Enums\MfaType $type = null,
        public ?Enums\HashFunction $hash_function = null,
        public ?Enums\CodeLength $code_length = null,
        public ?string $api_hostname = null,
        public ?string $clientid = null,
        public ?string $client_secret = null,
    ) {}

    public function method(): string
    {
        return 'mfa.create';
    }
}
