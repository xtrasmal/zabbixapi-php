<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * graph.update - Update existing graphs. Only the graphid property is required; only passed properties are updated, the rest remain unchanged.
 */
final class GraphUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $graphid,
        public ?int $height = null,
        public ?string $name = null,
        public ?int $width = null,
        public ?Enums\GraphGraphtype $graphtype = null,
        public ?float $percent_left = null,
        public ?float $percent_right = null,
        public ?Enums\GraphShow3d $show_3d = null,
        public ?Enums\GraphShowLegend $show_legend = null,
        public ?Enums\GraphShowWorkPeriod $show_work_period = null,
        public ?Enums\ShowTriggers $show_triggers = null,
        public ?float $yaxismax = null,
        public ?float $yaxismin = null,
        public ?string $ymax_itemid = null,
        public ?Enums\YmaxType $ymax_type = null,
        public ?string $ymin_itemid = null,
        public ?Enums\YminType $ymin_type = null,
        public ?string $uuid = null,
        public ?array $gitems = null,
    ) {}

    public function method(): string
    {
        return 'graph.update';
    }
}
