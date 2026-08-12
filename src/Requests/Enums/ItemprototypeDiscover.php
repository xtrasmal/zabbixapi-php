<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Item prototype discovery status. Possible values: 0 - (default) new items will be discovered; 1 - new items will not be discovered and existing items will be marked as lost.
 */
enum ItemprototypeDiscover: int
{
    case NewItemsWillBeDiscovered = 0;
    case NewItemsWillNotBe = 1;
}
