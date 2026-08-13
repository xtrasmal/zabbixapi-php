<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Api\Requests\Enums;

/**
 * Type of the dashboard widget. Possible values: actionlog - Action log; clock - Clock; dataover - Data overview (deprecated); discovery - Discovery status; favgraphs - Favorite graphs; favmaps - Favorite maps; gauge - Gauge; graph - Graph (classic); graphprototype - Graph prototype; honeycomb - Honeycomb; hostavail - Host availability; hostnavigator - Host navigator; itemnavigator - Item navigator; item - Item value; map - Map; navtree - Map Navigation Tree; piechart - Pie chart; plaintext - Plain text; problemhosts - Problem hosts; problems - Problems; problemsbysv - Problems by severity; slareport - SLA report; svggraph - Graph; systeminfo - System information; tophosts - Top hosts; toptriggers - Top triggers; trigover - Trigger overview; url - URL; web - Web monitoring.
 */
enum TemplatedashboardType: string
{
    case Actionlog = 'actionlog';
    case Clock = 'clock';
    case Dataover = 'dataover';
    case Discovery = 'discovery';
    case Favgraphs = 'favgraphs';
    case Favmaps = 'favmaps';
    case Gauge = 'gauge';
    case Graph = 'graph';
    case Graphprototype = 'graphprototype';
    case Honeycomb = 'honeycomb';
    case Hostavail = 'hostavail';
    case Hostnavigator = 'hostnavigator';
    case Itemnavigator = 'itemnavigator';
    case Item = 'item';
    case Map = 'map';
    case Navtree = 'navtree';
    case Piechart = 'piechart';
    case Plaintext = 'plaintext';
    case Problemhosts = 'problemhosts';
    case Problems = 'problems';
    case Problemsbysv = 'problemsbysv';
    case Slareport = 'slareport';
    case Svggraph = 'svggraph';
    case Systeminfo = 'systeminfo';
    case Tophosts = 'tophosts';
    case Toptriggers = 'toptriggers';
    case Trigover = 'trigover';
    case Url = 'url';
    case Web = 'web';
}
