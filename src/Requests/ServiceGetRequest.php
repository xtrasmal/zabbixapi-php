<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * service.get - Retrieve services according to the given parameters.
 */
final class ServiceGetRequest extends AbstractZabbixFilteredGetRequest
{
    public function __construct(
        public string|array|null $serviceids = null,
        public string|array|null $parentids = null,
        public ?bool $deep_parentids = null,
        public string|array|null $childids = null,
        public ?Enums\ServiceEvaltype $evaltype = null,
        public ?array $tags = null,
        public ?array $problem_tags = null,
        public ?bool $without_problem_tags = null,
        public string|array|null $slaids = null,
        public array|string|null $selectChildren = null,
        public array|string|null $selectParents = null,
        public array|string|null $selectTags = null,
        public array|string|null $selectProblemEvents = null,
        public array|string|null $selectProblemTags = null,
        public array|string|null $selectStatusRules = null,
        public ?array $selectStatusTimeline = null,
        public string|array|null $sortfield = null,
        public ?bool $countOutput = null,
        public ?bool $editable = null,
        public ?bool $excludeSearch = null,
        public ?array $filter = null,
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
        return 'service.get';
    }
}
