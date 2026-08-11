<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * Base for get requests. Zabbix 7.0 get methods share common query parameters
 * such as output.
 */
abstract class AbstractZabbixGetRequest extends AbstractZabbixRequest
{
    /** @param list<string>|string|\BackedEnum $output */
    final public function output(array|string|\BackedEnum $output): static
    {
        return $this->withParam('output', $output);
    }
}
