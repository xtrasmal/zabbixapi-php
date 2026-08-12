<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * History object types to return. Possible values: 0 - numeric float; 1 - character; 2 - log; 3 - (default) numeric unsigned; 4 - text; 5 - binary.
 */
enum History: int
{
    case NumericFloat = 0;
    case Character = 1;
    case Log = 2;
    case NumericUnsigned = 3;
    case Text = 4;
    case Binary = 5;
}
