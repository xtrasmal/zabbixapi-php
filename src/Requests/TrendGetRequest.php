<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * trend.get - Retrieve trend data according to the given parameters.
 */
final class TrendGetRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string|array|null $itemids = null,
        public ?int $time_from = null,
        public ?int $time_till = null,
        public ?bool $countOutput = null,
        public ?int $limit = null,
        public array|string|null $output = null,
    ) {}

    public function method(): string
    {
        return 'trend.get';
    }
}
