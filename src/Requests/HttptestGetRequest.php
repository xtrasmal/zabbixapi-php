<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * httptest.get - Retrieve web scenarios according to the given parameters.
 */
final class HttptestGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $groupids = null,
        public string|array|null $hostids = null,
        public string|array|null $httptestids = null,
        public ?bool $inherited = null,
        public ?bool $monitored = null,
        public ?bool $templated = null,
        public string|array|null $templateids = null,
        public ?bool $expandName = null,
        public ?bool $expandStepName = null,
        public ?Enums\HttptestEvaltype $evaltype = null,
        public ?array $tags = null,
        public array|string|null $selectHosts = null,
        public array|string|null $selectSteps = null,
        public array|string|null $selectTags = null,
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
        return 'httptest.get';
    }
}
