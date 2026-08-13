<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests;

/**
 * history.get - Retrieve history data according to the given parameters. May return historical data of a deleted entity if this data has not been removed by the housekeeper yet.
 */
final class HistoryGetRequest extends AbstractRequest
{
    public function method(): string
    {
        return 'history.get';
    }
}
