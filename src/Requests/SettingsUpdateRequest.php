<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * settings.update - Update existing common (system) settings.
 */
final class SettingsUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public ?string $default_lang = null,
        public ?string $default_timezone = null,
        public ?Enums\DefaultTheme $default_theme = null,
        public ?int $search_limit = null,
        public ?int $max_overview_table_size = null,
        public ?int $max_in_table = null,
        public ?Enums\ServerCheckInterval $server_check_interval = null,
        public ?string $work_period = null,
        public ?Enums\ShowTechnicalErrors $show_technical_errors = null,
        public ?string $history_period = null,
        public ?string $period_default = null,
        public ?string $max_period = null,
        public ?string $severity_color_0 = null,
        public ?string $severity_color_1 = null,
        public ?string $severity_color_2 = null,
        public ?string $severity_color_3 = null,
        public ?string $severity_color_4 = null,
        public ?string $severity_color_5 = null,
        public ?string $severity_name_0 = null,
        public ?string $severity_name_1 = null,
        public ?string $severity_name_2 = null,
        public ?string $severity_name_3 = null,
        public ?string $severity_name_4 = null,
        public ?string $severity_name_5 = null,
        public ?Enums\CustomColor $custom_color = null,
        public ?string $ok_period = null,
        public ?string $blink_period = null,
        public ?string $problem_unack_color = null,
        public ?string $problem_ack_color = null,
        public ?string $ok_unack_color = null,
        public ?string $ok_ack_color = null,
        public ?Enums\ProblemUnackStyle $problem_unack_style = null,
        public ?Enums\ProblemAckStyle $problem_ack_style = null,
        public ?Enums\OkUnackStyle $ok_unack_style = null,
        public ?Enums\OkAckStyle $ok_ack_style = null,
        public ?string $url = null,
        public ?string $discovery_groupid = null,
        public ?Enums\DefaultInventoryMode $default_inventory_mode = null,
        public ?string $alert_usrgrpid = null,
        public ?Enums\SnmptrapLogging $snmptrap_logging = null,
        public ?int $login_attempts = null,
        public ?string $login_block = null,
        public ?Enums\ValidateUriSchemes $validate_uri_schemes = null,
        public ?string $uri_valid_schemes = null,
        public ?string $x_frame_options = null,
        public ?Enums\IframeSandboxingEnabled $iframe_sandboxing_enabled = null,
        public ?string $iframe_sandboxing_exceptions = null,
        public ?string $connect_timeout = null,
        public ?string $socket_timeout = null,
        public ?string $media_type_test_timeout = null,
        public ?string $item_test_timeout = null,
        public ?string $script_timeout = null,
        public ?string $report_test_timeout = null,
        public ?Enums\AuditlogEnabled $auditlog_enabled = null,
        public ?Enums\AuditlogMode $auditlog_mode = null,
        public ?Enums\GeomapsTileProvider $geomaps_tile_provider = null,
        public ?string $geomaps_tile_url = null,
        public ?int $geomaps_max_zoom = null,
        public ?string $geomaps_attribution = null,
        public ?Enums\VaultProvider $vault_provider = null,
        public ?string $timeout_zabbix_agent = null,
        public ?string $timeout_simple_check = null,
        public ?string $timeout_snmp_agent = null,
        public ?string $timeout_external_check = null,
        public ?string $timeout_db_monitor = null,
        public ?string $timeout_http_agent = null,
        public ?string $timeout_ssh_agent = null,
        public ?string $timeout_telnet_agent = null,
        public ?string $timeout_script = null,
        public ?string $timeout_browser = null,
    ) {}

    public function method(): string
    {
        return 'settings.update';
    }
}
