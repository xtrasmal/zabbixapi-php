<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * housekeeping.update - Update existing housekeeping settings.
 */
final class HousekeepingUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public ?Enums\HkEventsMode $hk_events_mode = null,
        public ?string $hk_events_trigger = null,
        public ?string $hk_events_service = null,
        public ?string $hk_events_internal = null,
        public ?string $hk_events_discovery = null,
        public ?string $hk_events_autoreg = null,
        public ?Enums\HkServicesMode $hk_services_mode = null,
        public ?string $hk_services = null,
        public ?Enums\HkAuditMode $hk_audit_mode = null,
        public ?string $hk_audit = null,
        public ?Enums\HkSessionsMode $hk_sessions_mode = null,
        public ?string $hk_sessions = null,
        public ?Enums\HkHistoryMode $hk_history_mode = null,
        public ?Enums\HkHistoryGlobal $hk_history_global = null,
        public ?string $hk_history = null,
        public ?Enums\HkTrendsMode $hk_trends_mode = null,
        public ?Enums\HkTrendsGlobal $hk_trends_global = null,
        public ?string $hk_trends = null,
        public ?Enums\CompressionStatus $compression_status = null,
        public ?string $compress_older = null,
    ) {}

    public function method(): string
    {
        return 'housekeeping.update';
    }
}
