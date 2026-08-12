<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * graphprototype.update - Update existing graph prototypes.
 */
final class GraphprototypeUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $graphid,
        public ?int $height = null,
        public ?string $name = null,
        public ?int $width = null,
        public ?Enums\GraphprototypeGraphtype $graphtype = null,
        public ?float $percent_left = null,
        public ?float $percent_right = null,
        public ?Enums\GraphprototypeShow3d $show_3d = null,
        public ?Enums\GraphprototypeShowLegend $show_legend = null,
        public ?Enums\GraphprototypeShowWorkPeriod $show_work_period = null,
        public ?float $yaxismax = null,
        public ?float $yaxismin = null,
        public ?string $ymax_itemid = null,
        public ?Enums\YmaxType $ymax_type = null,
        public ?string $ymin_itemid = null,
        public ?Enums\YminType $ymin_type = null,
        public ?Enums\GraphprototypeDiscover $discover = null,
        public ?string $uuid = null,
        public ?array $gitems = null,
    ) {}

    public function method(): string
    {
        return 'graphprototype.update';
    }
}
