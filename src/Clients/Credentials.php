<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Clients;

use IntelliTrend\Zabbix\ZabbixApi;
use IntelliTrend\Zabbix\ZabbixApiException;

final class Credentials
{
    private function __construct(
        public readonly string $baseUrl,
        public readonly string $bearerToken,
    ) {
    }

    /**
     * @throws ZabbixApiException
     */
    public static function fromLogin(string $zabUrl, string $zabToken): self
    {
        if (trim($zabUrl) === '') {
            throw new ZabbixApiException('Missing Zabbix URL.', ZabbixApi::EXCEPTION_CLASS_CODE);
        }

        if (trim($zabToken) === '') {
            throw new ZabbixApiException('Missing Zabbix API token.', ZabbixApi::EXCEPTION_CLASS_CODE_AUTH);
        }

        return new self($zabUrl, $zabToken);
    }

    public function endpoint(): string
    {
        return rtrim($this->baseUrl, '/') . '/api_jsonrpc.php';
    }
}
