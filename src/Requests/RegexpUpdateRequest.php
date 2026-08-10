<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * regexp.update - Update existing global regular expressions.
 */
final class RegexpUpdateRequest extends AbstractZabbixRequest
{
    public function __construct(
        public string $regexpid,
        public ?string $name = null,
        public ?string $test_string = null,
        public ?array $expressions = null,
    ) {}

    public static function method(): string
    {
        return 'regexp.update';
    }
}
