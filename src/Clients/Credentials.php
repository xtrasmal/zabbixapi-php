<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Clients;

use IntelliTrend\Zabbix\ZabbixApi;
use IntelliTrend\Zabbix\ZabbixApiException;

final class Credentials
{
    private function __construct(
        public readonly string $baseUrl,
        public readonly ?string $bearerToken = null,
    ) {
    }

    /**
     * @throws ZabbixApiException
     */
    public static function fromEndpoint(string $zabUrl, ?string $zabToken = null): self
    {
        if (trim($zabUrl) === '') {
            throw new ZabbixApiException('Missing Zabbix URL.', ZabbixApi::EXCEPTION_CLASS_CODE);
        }

        if ($zabToken !== null && trim($zabToken) === '') {
            throw new ZabbixApiException('Missing Zabbix API token.', ZabbixApi::EXCEPTION_CLASS_CODE_AUTH);
        }

        return new self($zabUrl, $zabToken);
    }

    public function withBearerToken(string $bearerToken): self
    {
        if (trim($bearerToken) === '') {
            throw new ZabbixApiException('Missing Zabbix API token.', ZabbixApi::EXCEPTION_CLASS_CODE_AUTH);
        }

        return new self($this->baseUrl, $bearerToken);
    }

    public function endpoint(): string
    {
        return rtrim($this->baseUrl, '/') . '/api_jsonrpc.php';
    }
}
