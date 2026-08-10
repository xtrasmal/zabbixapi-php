<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * map.create - Create new maps.
 */
final class MapCreateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $name,
        public int $width,
        public int $height,
        public ?string $backgroundid = null,
        public ?Enums\ExpandMacros $expand_macros = null,
        public ?Enums\Expandproblem $expandproblem = null,
        public ?Enums\GridAlign $grid_align = null,
        public ?Enums\GridShow $grid_show = null,
        public ?Enums\GridSize $grid_size = null,
        public ?Enums\Highlight $highlight = null,
        public ?string $iconmapid = null,
        public ?Enums\LabelFormat $label_format = null,
        public ?Enums\MapLabelLocation $label_location = null,
        public ?string $label_string_host = null,
        public ?string $label_string_hostgroup = null,
        public ?string $label_string_image = null,
        public ?string $label_string_map = null,
        public ?string $label_string_trigger = null,
        public ?Enums\LabelType $label_type = null,
        public ?Enums\LabelTypeHost $label_type_host = null,
        public ?Enums\LabelTypeHostgroup $label_type_hostgroup = null,
        public ?Enums\LabelTypeImage $label_type_image = null,
        public ?Enums\LabelTypeMap $label_type_map = null,
        public ?Enums\LabelTypeTrigger $label_type_trigger = null,
        public ?Enums\Markelements $markelements = null,
        public ?Enums\SeverityMin $severity_min = null,
        public ?Enums\ShowUnack $show_unack = null,
        public ?string $userid = null,
        public ?Enums\MapPrivate $private = null,
        public ?Enums\ShowSuppressed $show_suppressed = null,
        public ?array $links = null,
        public ?array $selements = null,
        public ?array $urls = null,
        public ?array $users = null,
        public ?array $userGroups = null,
        public ?array $shapes = null,
        public ?array $lines = null,
    ) {}

    public static function method(): string
    {
        return 'map.create';
    }
}
