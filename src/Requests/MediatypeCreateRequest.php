<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * mediatype.create - Create new media types.
 */
final class MediatypeCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public Enums\MediatypeType $type,
        public ?string $exec_path = null,
        public ?string $gsm_modem = null,
        public ?string $passwd = null,
        public ?Enums\Provider $provider = null,
        public ?string $smtp_email = null,
        public ?string $smtp_helo = null,
        public ?string $smtp_server = null,
        public ?int $smtp_port = null,
        public ?Enums\SmtpSecurity $smtp_security = null,
        public ?Enums\SmtpVerifyHost $smtp_verify_host = null,
        public ?Enums\SmtpVerifyPeer $smtp_verify_peer = null,
        public ?Enums\SmtpAuthentication $smtp_authentication = null,
        public ?Enums\MediatypeStatus $status = null,
        public ?string $username = null,
        public ?int $maxsessions = null,
        public ?int $maxattempts = null,
        public ?string $attempt_interval = null,
        public ?Enums\ContentType $content_type = null,
        public ?Enums\MessageFormat $message_format = null,
        public ?string $script = null,
        public ?string $timeout = null,
        public ?Enums\ProcessTags $process_tags = null,
        public ?Enums\ShowEventMenu $show_event_menu = null,
        public ?string $event_menu_url = null,
        public ?string $event_menu_name = null,
        public ?array $parameters = null,
        public ?string $description = null,
        public ?array $message_templates = null,
    ) {}

    public function method(): string
    {
        return 'mediatype.create';
    }
}
