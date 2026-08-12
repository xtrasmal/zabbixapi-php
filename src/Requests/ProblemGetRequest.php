<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * problem.get - Retrieve unresolved problems (and, if requested, recently resolved ones) according to the given parameters.
 */
final class ProblemGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $eventids = null,
        public string|array|null $groupids = null,
        public string|array|null $hostids = null,
        public string|array|null $objectids = null,
        public ?Enums\ProblemSource $source = null,
        public ?Enums\ProblemObject $object = null,
        public ?bool $acknowledged = null,
        public ?int $action = null,
        public string|array|null $action_userids = null,
        public ?bool $suppressed = null,
        public ?bool $symptom = null,
        public int|array|null $severities = null,
        public ?Enums\ProblemEvaltype $evaltype = null,
        public ?array $tags = null,
        public ?bool $recent = null,
        public ?string $eventid_from = null,
        public ?string $eventid_till = null,
        public ?int $time_from = null,
        public ?int $time_till = null,
        public array|string|null $selectAcknowledges = null,
        public array|string|null $selectTags = null,
        public array|string|null $selectSuppressionData = null,
        public ?array $filter = null,
        public string|array|null $sortfield = null,
        public ?bool $countOutput = null,
        public ?bool $editable = null,
        public ?bool $excludeSearch = null,
        public ?int $limit = null,
        public array|string|null $output = null,
        public ?bool $preservekeys = null,
        public ?array $search = null,
        public ?bool $searchByAny = null,
        public ?bool $searchWildcardsEnabled = null,
        public string|array|null $sortorder = null,
        public ?bool $startSearch = null,
    ) {}

    public function method(): string
    {
        return 'problem.get';
    }
}
