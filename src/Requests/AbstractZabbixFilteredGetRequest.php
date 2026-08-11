<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * Base for get requests whose Zabbix 7.0 schema accepts the common filter
 * parameter.
 */
abstract class AbstractZabbixFilteredGetRequest extends AbstractZabbixGetRequest
{
    /** @param array<string, mixed> $filter */
    final public function filter(array $filter): static
    {
        return $this->withParam('filter', $filter);
    }
}
