<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Font of the text within shape. Possible values: 0 - Georgia, serif; 1 - "Palatino Linotype", "Book Antiqua", Palatino, serif; 2 - "Times New Roman", Times, serif; 3 - Arial, Helvetica, sans-serif; 4 - "Arial Black", Gadget, sans-serif; 5 - "Comic Sans MS", cursive, sans-serif; 6 - Impact, Charcoal, sans-serif; 7 - "Lucida Sans Unicode", "Lucida Grande", sans-serif; 8 - Tahoma, Geneva, sans-serif; 9 - "Trebuchet MS", Helvetica, sans-serif; 10 - Verdana, Geneva, sans-serif; 11 - "Courier New", Courier, monospace; 12 - "Lucida Console", Monaco, monospace. Default: 9.
 */
enum Font: int
{
    case Georgia = 0;
    case PalatinoLinotype = 1;
    case TimesNewRoman = 2;
    case Arial = 3;
    case ArialBlack = 4;
    case ComicSansMs = 5;
    case Impact = 6;
    case LucidaSansUnicode = 7;
    case Tahoma = 8;
    case TrebuchetMs = 9;
    case Verdana = 10;
    case CourierNew = 11;
    case LucidaConsole = 12;
}
