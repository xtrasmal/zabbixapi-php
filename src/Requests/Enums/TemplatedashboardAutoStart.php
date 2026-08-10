<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Auto start slideshow. Possible values: 0 - do not auto start slideshow; 1 - (default) auto start slideshow.
 */
enum TemplatedashboardAutoStart: int
{
    case DoNotAutoStartSlideshow = 0;
    case AutoStartSlideshow = 1;
}
