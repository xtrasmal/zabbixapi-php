<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Auto start slideshow. 0 - do not auto start slideshow; 1 - (default) auto start slideshow.
 */
enum DashboardAutoStart: int
{
    case DoNotAutoStartSlideshow = 0;
    case AutoStartSlideshow = 1;
}
