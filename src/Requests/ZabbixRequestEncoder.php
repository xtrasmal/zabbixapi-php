<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests;

/**
 * Serializes a request's params() to the JSON-RPC "params" bytes. params() is a
 * plain PHP array; the only thing added here is the JSON root shape: an
 * object-shaped request encodes as a JSON object (so an all-optional one is {},
 * not []), a list-shaped request as an array. The (object) cast is transient —
 * it never touches params().
 */
final class ZabbixRequestEncoder
{
    public function encodeParams(ZabbixRequest $request): string
    {
        $params = $request->params();
        $data = $request instanceof AbstractZabbixListRequest ? $params : (object) $params;

        return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
    }
}
