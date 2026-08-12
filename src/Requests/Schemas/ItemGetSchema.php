<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class ItemGetSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for item.get, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/item/item.get',
            'title' => 'item.get',
            'description' => 'Retrieve items according to the given parameters.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/item/get',
            'type' => 'object',
            'properties' => [
                'itemids' => [
                    'oneOf' => [
                        [
                            'type' => 'string',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                    ],
                    'description' => 'Return only items with the given IDs.',
                ],
                'groupids' => [
                    'oneOf' => [
                        [
                            'type' => 'string',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                    ],
                    'description' => 'Return only items that belong to the hosts from the given groups.',
                ],
                'templateids' => [
                    'oneOf' => [
                        [
                            'type' => 'string',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                    ],
                    'description' => 'Return only items that belong to the given templates.',
                ],
                'hostids' => [
                    'oneOf' => [
                        [
                            'type' => 'string',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                    ],
                    'description' => 'Return only items that belong to the given hosts.',
                ],
                'proxyids' => [
                    'oneOf' => [
                        [
                            'type' => 'string',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                    ],
                    'description' => 'Return only items that are monitored by the given proxies.',
                ],
                'interfaceids' => [
                    'oneOf' => [
                        [
                            'type' => 'string',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                    ],
                    'description' => 'Return only items that use the given host interfaces.',
                ],
                'graphids' => [
                    'oneOf' => [
                        [
                            'type' => 'string',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                    ],
                    'description' => 'Return only items that are used in the given graphs.',
                ],
                'triggerids' => [
                    'oneOf' => [
                        [
                            'type' => 'string',
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                    ],
                    'description' => 'Return only items that are used in the given triggers.',
                ],
                'webitems' => [
                    'type' => 'boolean',
                    'description' => 'Include web items in the result.',
                ],
                'inherited' => [
                    'type' => 'boolean',
                    'description' => 'If set to true return only items inherited from a template.',
                ],
                'templated' => [
                    'type' => 'boolean',
                    'description' => 'If set to true return only items that belong to templates.',
                ],
                'monitored' => [
                    'type' => 'boolean',
                    'description' => 'If set to true return only enabled items that belong to monitored hosts.',
                ],
                'group' => [
                    'type' => 'string',
                    'description' => 'Return only items that belong to a group with the given name.',
                ],
                'host' => [
                    'type' => 'string',
                    'description' => 'Return only items that belong to a host with the given name.',
                ],
                'evaltype' => [
                    'type' => 'integer',
                    'description' => 'Tag evaluation method.

Possible values:
0 - (default) And/Or;
2 - Or.',
                    'enum' => [
                        0,
                        2,
                    ],
                ],
                'tags' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'object',
                        'properties' => [
                            'tag' => [
                                'type' => 'string',
                                'description' => 'Tag name to match.',
                            ],
                            'value' => [
                                'type' => 'string',
                                'description' => 'Tag value to match.',
                            ],
                            'operator' => [
                                'type' => 'integer',
                                'description' => 'Possible operator values:
0 - (default) Contains;
1 - Equals;
2 - Does not contain;
3 - Does not equal;
4 - Exists;
5 - Does not exist.',
                                'enum' => [
                                    0,
                                    1,
                                    2,
                                    3,
                                    4,
                                    5,
                                ],
                            ],
                        ],
                        'additionalProperties' => false,
                    ],
                    'description' => 'Return only items with the given tags.
Format: [{"tag": "<tag>", "value": "<value>", "operator": "<operator>"}, ...].
An empty array returns all items.

Possible operator values:
0 - (default) Contains;
1 - Equals;
2 - Does not contain;
3 - Does not equal;
4 - Exists;
5 - Does not exist.',
                ],
                'with_triggers' => [
                    'type' => 'boolean',
                    'description' => 'If set to true return only items that are used in triggers.',
                ],
                'selectHosts' => [
                    'oneOf' => [
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                        [
                            'enum' => [
                                'extend',
                                'count',
                            ],
                        ],
                    ],
                    'description' => 'Return a hosts property with an array of hosts that the item belongs to.',
                ],
                'selectInterfaces' => [
                    'oneOf' => [
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                        [
                            'enum' => [
                                'extend',
                                'count',
                            ],
                        ],
                    ],
                    'description' => 'Return an interfaces property with an array of host interfaces used by the item.',
                ],
                'selectTriggers' => [
                    'oneOf' => [
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                        [
                            'enum' => [
                                'extend',
                                'count',
                            ],
                        ],
                    ],
                    'description' => 'Return a triggers property with the triggers that the item is used in.

Supports count.',
                ],
                'selectGraphs' => [
                    'oneOf' => [
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                        [
                            'enum' => [
                                'extend',
                                'count',
                            ],
                        ],
                    ],
                    'description' => 'Return a graphs property with the graphs that contain the item.

Supports count.',
                ],
                'selectDiscoveryRule' => [
                    'oneOf' => [
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                        [
                            'enum' => [
                                'extend',
                                'count',
                            ],
                        ],
                    ],
                    'description' => 'Return a discoveryRule property with the LLD rule that created the item.',
                ],
                'selectItemDiscovery' => [
                    'oneOf' => [
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                        [
                            'enum' => [
                                'extend',
                                'count',
                            ],
                        ],
                    ],
                    'description' => 'Return an itemDiscovery property with the item discovery object. The item discovery object links the item to an item prototype from which it was created.

It has the following properties:
itemdiscoveryid - (string) ID of the item discovery;
itemid - (string) ID of the discovered item;
parent_itemid - (string) ID of the item prototype from which the item has been created;
key_ - (string) key of the item prototype;
lastcheck - (timestamp) time when the item was last discovered;
status - (int) item discovery status:
0 - (default) item is discovered,
1 - item is not discovered anymore;
ts_delete - (timestamp) time when an item that is no longer discovered will be deleted;
ts_disable - (timestamp) time when an item that is no longer discovered will be disabled;
disable_source - (int) indicator of whether item was disabled by an LLD rule or manually:
0 - (default) disabled automatically,
1 - disabled by an LLD rule.',
                ],
                'selectPreprocessing' => [
                    'oneOf' => [
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                        [
                            'enum' => [
                                'extend',
                                'count',
                            ],
                        ],
                    ],
                    'description' => 'Return a preprocessing property with item preprocessing options.',
                ],
                'selectTags' => [
                    'oneOf' => [
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                        [
                            'enum' => [
                                'extend',
                                'count',
                            ],
                        ],
                    ],
                    'description' => 'Return the item tags in tags property.',
                ],
                'selectValueMap' => [
                    'oneOf' => [
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                        [
                            'enum' => [
                                'extend',
                                'count',
                            ],
                        ],
                    ],
                    'description' => 'Return a valuemap property with item value map.',
                ],
                'filter' => [
                    'type' => 'object',
                    'description' => 'Return only those results that exactly match the given filter.

Accepts an object, where the keys are property names, and the values are either a single value or an array of values to match against.

Does not support properties of text data type.

Supports additional properties:
host - technical name of the host that the item belongs to.',
                ],
                'limitSelects' => [
                    'type' => 'integer',
                    'description' => 'Limits the number of records returned by subselects.

Applies to the following subselects:
selectGraphs - results will be sorted by name;
selectTriggers - results will be sorted by description.',
                ],
                'sortfield' => [
                    'oneOf' => [
                        [
                            'enum' => [
                                'itemid',
                                'name',
                                'key_',
                                'delay',
                                'history',
                                'trends',
                                'type',
                                'status',
                            ],
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                'enum' => [
                                    'itemid',
                                    'name',
                                    'key_',
                                    'delay',
                                    'history',
                                    'trends',
                                    'type',
                                    'status',
                                ],
                            ],
                        ],
                    ],
                    'description' => 'Sort the result by the given properties.

Possible values: itemid, name, key_, delay, history, trends, type, status.',
                ],
                'countOutput' => [
                    'type' => 'boolean',
                    'description' => 'Return the number of records in the result instead of the actual data.',
                ],
                'editable' => [
                    'type' => 'boolean',
                    'description' => 'If set to true, return only objects that the user has write permissions to. Default: false.',
                ],
                'excludeSearch' => [
                    'type' => 'boolean',
                    'description' => 'Return results that do not match the criteria given in the search parameter.',
                ],
                'limit' => [
                    'type' => 'integer',
                    'description' => 'Limit the number of records returned.',
                ],
                'output' => [
                    'oneOf' => [
                        [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                            ],
                        ],
                        [
                            'enum' => [
                                'extend',
                                'count',
                            ],
                        ],
                    ],
                    'description' => 'Object properties to be returned. Default: extend.',
                ],
                'preservekeys' => [
                    'type' => 'boolean',
                    'description' => 'Use IDs as keys in the resulting array.',
                ],
                'search' => [
                    'type' => 'object',
                    'description' => 'Return results that match the given pattern (case-insensitive). Supports string and text properties.',
                ],
                'searchByAny' => [
                    'type' => 'boolean',
                    'description' => 'If true, return results that match any of the criteria given in the filter or search parameter. Default: false.',
                ],
                'searchWildcardsEnabled' => [
                    'type' => 'boolean',
                    'description' => 'If true, enables the use of \'*\' as a wildcard character. Default: false.',
                ],
                'sortorder' => [
                    'oneOf' => [
                        [
                            'enum' => [
                                'ASC',
                                'DESC',
                            ],
                        ],
                        [
                            'type' => 'array',
                            'items' => [
                                'enum' => [
                                    'ASC',
                                    'DESC',
                                ],
                            ],
                        ],
                    ],
                    'description' => 'Order of sorting. ASC or DESC.',
                ],
                'startSearch' => [
                    'type' => 'boolean',
                    'description' => 'The search parameter will compare the beginning of fields. Ignored if searchWildcardsEnabled is set.',
                ],
            ],
            'additionalProperties' => false,
        ];
    }
}
