<?php

declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Geomap tile provider. Possible values: OpenStreetMap.Mapnik - (default) OpenStreetMap Mapnik; OpenTopoMap - OpenTopoMap; Stamen.TonerLite - Stamen Toner Lite; Stamen.Terrain - Stamen Terrain; USGS.USTopo - USGS US Topo; USGS.USImagery - USGS US Imagery. Supports empty string to specify custom values of geomaps_tile_url, geomaps_max_zoom and geomaps_attribution.
 */
enum GeomapsTileProvider: string
{
    case OpenstreetmapMapnik = 'OpenStreetMap.Mapnik';
    case Opentopomap = 'OpenTopoMap';
    case StamenTonerlite = 'Stamen.TonerLite';
    case StamenTerrain = 'Stamen.Terrain';
    case UsgsUstopo = 'USGS.USTopo';
    case UsgsUsimagery = 'USGS.USImagery';
    case V6 = '';
}
