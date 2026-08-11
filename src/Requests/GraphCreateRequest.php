<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * graph.create - Create new graphs.
 */
final class GraphCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public int $height,
        public string $name,
        public int $width,
        public array $gitems,
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
    ) {}

    public function method(): string
    {
        return 'graph.create';
    }
}
