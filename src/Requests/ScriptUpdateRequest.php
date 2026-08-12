<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * script.update - Update existing scripts. The scriptid property must be defined for each script; all other properties are optional and only the passed properties will be updated. An exception is the type property change from 5 (Webhook) to other: the parameters property will be cleaned.
 */
final class ScriptUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $scriptid,
        public ?string $name = null,
        public ?Enums\ScriptType $type = null,
        public ?string $command = null,
        public ?Enums\ScriptScope $scope = null,
        public ?Enums\ExecuteOn $execute_on = null,
        public ?string $menu_path = null,
        public ?Enums\ScriptAuthtype $authtype = null,
        public ?string $username = null,
        public ?string $password = null,
        public ?string $publickey = null,
        public ?string $privatekey = null,
        public ?string $port = null,
        public ?string $groupid = null,
        public ?string $usrgrpid = null,
        public ?Enums\HostAccess $host_access = null,
        public ?string $confirmation = null,
        public ?string $timeout = null,
        public ?array $parameters = null,
        public ?string $description = null,
        public ?string $url = null,
        public ?Enums\NewWindow $new_window = null,
        public ?Enums\Manualinput $manualinput = null,
        public ?string $manualinput_prompt = null,
        public ?string $manualinput_validator = null,
        public ?Enums\ManualinputValidatorType $manualinput_validator_type = null,
        public ?string $manualinput_default_value = null,
    ) {}

    public function method(): string
    {
        return 'script.update';
    }
}
