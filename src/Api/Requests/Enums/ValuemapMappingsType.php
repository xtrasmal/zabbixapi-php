<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Mapping match type. Possible values: 0 - (default) mapping will be applied if value is equal; 1 - mapping will be applied if value is greater or equal (supported only for items having value type "numeric unsigned", "numeric float"); 2 - mapping will be applied if value is less or equal (supported only for items having value type "numeric unsigned", "numeric float"); 3 - mapping will be applied if value is in range (ranges are inclusive; multiple ranges, separated by comma character, can be defined) (supported only for items having value type "numeric unsigned", "numeric float"); 4 - mapping will be applied if value matches a regular expression (supported only for items having value type "character"); 5 - if no matches are found, mapping will not be applied, and the default value will be used. If type is set to "0", "1", "2", "3", "4", then value cannot be empty. If type is set to "5", then value must be empty.
 */
enum ValuemapMappingsType: int
{
    case MappingWillBeAppliedIf = 0;
    case MappingWillBeAppliedIf2 = 1;
    case MappingWillBeAppliedIf3 = 2;
    case MappingWillBeAppliedIf4 = 3;
    case MappingWillBeAppliedIf5 = 4;
    case IfNoMatchesAreFound = 5;
}
