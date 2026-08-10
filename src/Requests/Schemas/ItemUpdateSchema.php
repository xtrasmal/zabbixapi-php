<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Schemas;

use IntelliTrend\Zabbix\Requests\RequestSchema;

final class ItemUpdateSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for item.update, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/item/item.update',
            'title' => 'item.update',
            'description' => 'Update existing items. The itemid property must be defined for each item; all other properties are optional. Web items cannot be updated via the Zabbix API.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/item/update',
            'type' => 'object',
            'properties' => [
                'itemid' => [
                    'type' => 'string',
                    'description' => 'ID of the item.

Property behavior:
- read-only
- required for update operations',
                ],
                'delay' => [
                    'type' => 'string',
                    'description' => 'Update interval of the item.

Accepts seconds or time unit with suffix (e.g., 30s, 1m, 2h, 1d) and, optionally, one or more custom intervals, all separated by semicolons. Custom intervals can be a mix of flexible and scheduling intervals.

Accepts user macros. If used, the value must be a single macro. Multiple macros or macros mixed with text are not supported. Flexible intervals may be written as two macros separated by a forward slash (e.g., {$FLEX_INTERVAL}/{$FLEX_PERIOD}).

Example:
1h;wd1-5h9-18;{$Macro1}/1-7,00:00-24:00;0/6-7,12:00-24:00;{$Macro2}/{$Macro3}

Property behavior:
- required if type is set to "Zabbix agent" (0), "Simple check" (3), "Zabbix internal" (5), "External check" (10), "Database monitor" (11), "IPMI agent" (12), "SSH agent" (13), "TELNET agent" (14), "Calculated" (15), "JMX agent" (16), "HTTP agent" (19), "SNMP agent" (20), "Script" (21), "Browser" (22), or if type is set to "Zabbix agent (active)" (7) and key_ does not contain "mqtt.get"',
                ],
                'hostid' => [
                    'type' => 'string',
                    'description' => 'ID of the host or template that the item belongs to.

Property behavior:
- constant
- required for create operations',
                ],
                'interfaceid' => [
                    'type' => 'string',
                    'description' => 'ID of the item\'s host interface.

Property behavior:
- required if item belongs to host and type is set to "Zabbix agent", "IPMI agent", "JMX agent", "SNMP trap", or "SNMP agent"
- supported if item belongs to host and type is set to "Simple check", "External check", "SSH agent", "TELNET agent", or "HTTP agent"
- read-only for discovered objects',
                ],
                'key_' => [
                    'type' => 'string',
                    'description' => 'Item key.

Property behavior:
- required for create operations
- read-only for inherited objects or discovered objects',
                ],
                'name' => [
                    'type' => 'string',
                    'description' => 'Name of the item.
Supports user macros.

Property behavior:
- required for create operations
- read-only for inherited objects or discovered objects',
                ],
                'type' => [
                    'type' => 'integer',
                    'description' => 'Type of the item.

Possible values:
0 - Zabbix agent;
2 - Zabbix trapper;
3 - Simple check;
5 - Zabbix internal;
7 - Zabbix agent (active);
9 - Web item;
10 - External check;
11 - Database monitor;
12 - IPMI agent;
13 - SSH agent;
14 - TELNET agent;
15 - Calculated;
16 - JMX agent;
17 - SNMP trap;
18 - Dependent item;
19 - HTTP agent;
20 - SNMP agent;
21 - Script;
22 - Browser.

Property behavior:
- required for create operations
- read-only for inherited objects or discovered objects',
                    'enum' => [
                        0,
                        2,
                        3,
                        5,
                        7,
                        9,
                        10,
                        11,
                        12,
                        13,
                        14,
                        15,
                        16,
                        17,
                        18,
                        19,
                        20,
                        21,
                        22,
                    ],
                ],
                'url' => [
                    'type' => 'string',
                    'description' => 'URL string.
Supports user macros, {HOST.IP}, {HOST.CONN}, {HOST.DNS}, {HOST.HOST}, {HOST.NAME}, {ITEM.ID}, {ITEM.KEY}.

Property behavior:
- required if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                ],
                'value_type' => [
                    'type' => 'integer',
                    'description' => 'Type of information of the item.

Possible values:
0 - numeric float;
1 - character;
2 - log;
3 - numeric unsigned;
4 - text;
5 - binary.

Property behavior:
- required for create operations
- read-only for inherited objects or discovered objects',
                    'enum' => [
                        0,
                        1,
                        2,
                        3,
                        4,
                        5,
                    ],
                ],
                'allow_traps' => [
                    'type' => 'integer',
                    'description' => 'Allow to populate value similarly to the trapper item.

0 - (default) Do not allow to accept incoming data;
1 - Allow to accept incoming data.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for discovered objects',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'authtype' => [
                    'type' => 'integer',
                    'description' => 'Authentication method.

Possible values if type is set to "SSH agent":
0 - (default) password;
1 - public key.

Possible values if type is set to "HTTP agent":
0 - (default) none;
1 - basic;
2 - NTLM;
3 - Kerberos;
4 - Digest.

Property behavior:
- supported if type is set to "SSH agent" or "HTTP agent"
- read-only for inherited objects (if type is set to "HTTP agent") or discovered objects',
                    'enum' => [
                        0,
                        1,
                        2,
                        3,
                        4,
                    ],
                ],
                'description' => [
                    'type' => 'string',
                    'description' => 'Description of the item.

Property behavior:
- read-only for discovered objects',
                ],
                'follow_redirects' => [
                    'type' => 'integer',
                    'description' => 'Follow response redirects while polling data.

Possible values:
0 - Do not follow redirects;
1 - (default) Follow redirects.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'headers' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'object',
                        'properties' => [
                            'name' => [
                                'type' => 'string',
                                'description' => 'HTTP header name.

Property behavior:
- required',
                            ],
                            'value' => [
                                'type' => 'string',
                                'description' => 'Header value.

Property behavior:
- required',
                            ],
                        ],
                        'required' => [
                            'name',
                            'value',
                        ],
                        'additionalProperties' => false,
                    ],
                    'description' => 'Array of headers that will be sent when performing an HTTP request.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                ],
                'history' => [
                    'type' => 'string',
                    'description' => 'A time unit of how long the history data should be stored.
Also accepts user macro.

Default: 31d.

Property behavior:
- read-only for discovered objects',
                ],
                'http_proxy' => [
                    'type' => 'string',
                    'description' => 'HTTP(S) proxy connection string.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                ],
                'inventory_link' => [
                    'type' => 'integer',
                    'description' => 'ID of the host inventory field that is populated by the item.

Refer to the host inventory page for a list of supported host inventory fields and their IDs.

Default: 0.

Property behavior:
- supported if value_type is set to "numeric float", "character", "numeric unsigned", or "text"
- read-only for discovered objects',
                ],
                'ipmi_sensor' => [
                    'type' => 'string',
                    'description' => 'IPMI sensor.

Property behavior:
- required if type is set to "IPMI agent" and key_ is not set to "ipmi.get"
- supported if type is set to "IPMI agent"
- read-only for inherited objects or discovered objects',
                ],
                'jmx_endpoint' => [
                    'type' => 'string',
                    'description' => 'JMX agent custom connection string.

Default value: service:jmx:rmi:///jndi/rmi://{HOST.CONN}:{HOST.PORT}/jmxrmi

Property behavior:
- supported if type is set to "JMX agent"
- read-only for discovered objects',
                ],
                'logtimefmt' => [
                    'type' => 'string',
                    'description' => 'Format of the time in log entries.

Property behavior:
- supported if value_type is set to "log"
- read-only for inherited objects or discovered objects',
                ],
                'master_itemid' => [
                    'type' => 'string',
                    'description' => 'ID of the master item.
Recursion up to 3 dependent items and maximum count of dependent items equal to 29999 are allowed.

Property behavior:
- required if type is set to "Dependent item"
- read-only for inherited objects or discovered objects',
                ],
                'output_format' => [
                    'type' => 'integer',
                    'description' => 'Should the response be converted to JSON.

0 - (default) Store raw;
1 - Convert to JSON.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'params' => [
                    'type' => 'string',
                    'description' => 'Additional parameters depending on the type of the item:
- executed script for SSH agent and TELNET agent items;
- SQL query for database monitor items;
- formula for calculated items;
- the script for script and browser items.

Property behavior:
- required if type is set to "Database monitor", "SSH agent", "TELNET agent", "Calculated", "Script", or "Browser"
- read-only for inherited objects (if type is set to "Script" or "Browser") or discovered objects',
                ],
                'parameters' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'object',
                        'properties' => [
                            'name' => [
                                'type' => 'string',
                                'description' => 'Name of the parameter. Must be unique among an item\'s parameters.',
                            ],
                            'value' => [
                                'type' => 'string',
                                'description' => 'Value of the parameter.',
                            ],
                        ],
                        'required' => [
                            'name',
                            'value',
                        ],
                        'additionalProperties' => false,
                    ],
                    'description' => 'Additional parameters if type is set to "Script" or "Browser". Array of objects with name and value properties, where name must be unique.

Property behavior:
- supported if type is set to "Script" or "Browser"
- read-only for inherited objects or discovered objects Represented as an array of {name, value} objects; name must be unique.',
                ],
                'password' => [
                    'type' => 'string',
                    'description' => 'Password for authentication.

Property behavior:
- required if type is set to "JMX agent" and username is set
- supported if type is set to "Simple check", "SSH agent", "TELNET agent", "Database monitor", or "HTTP agent"
- read-only for inherited objects (if type is set to "HTTP agent") or discovered objects',
                ],
                'post_type' => [
                    'type' => 'integer',
                    'description' => 'Type of post data body stored in posts property.

Possible values:
0 - (default) Raw data;
2 - JSON data;
3 - XML data.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                    'enum' => [
                        0,
                        2,
                        3,
                    ],
                ],
                'posts' => [
                    'type' => 'string',
                    'description' => 'HTTP(S) request body data.

Property behavior:
- required if type is set to "HTTP agent" and post_type is set to "JSON data" or "XML data"
- supported if type is set to "HTTP agent" and post_type is set to "Raw data"
- read-only for inherited objects or discovered objects',
                ],
                'privatekey' => [
                    'type' => 'string',
                    'description' => 'Name of the private key file.

Property behavior:
- required if type is set to "SSH agent" and authtype is set to "public key"
- read-only for discovered objects',
                ],
                'publickey' => [
                    'type' => 'string',
                    'description' => 'Name of the public key file.

Property behavior:
- required if type is set to "SSH agent" and authtype is set to "public key"
- read-only for discovered objects',
                ],
                'query_fields' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'object',
                        'properties' => [
                            'name' => [
                                'type' => 'string',
                                'description' => 'Name of the parameter.

Property behavior:
- required',
                            ],
                            'value' => [
                                'type' => 'string',
                                'description' => 'Parameter value.

Property behavior:
- required',
                            ],
                        ],
                        'required' => [
                            'name',
                            'value',
                        ],
                        'additionalProperties' => false,
                    ],
                    'description' => 'Array of query fields that will be sent when performing an HTTP request.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                ],
                'request_method' => [
                    'type' => 'integer',
                    'description' => 'Type of request method.

Possible values:
0 - (default) GET;
1 - POST;
2 - PUT;
3 - HEAD.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                    'enum' => [
                        0,
                        1,
                        2,
                        3,
                    ],
                ],
                'retrieve_mode' => [
                    'type' => 'integer',
                    'description' => 'What part of response should be stored.

Possible values if request_method is set to "GET", "POST", or "PUT":
0 - (default) Body;
1 - Headers;
2 - Both body and headers will be stored.

Possible values if request_method is set to "HEAD":
1 - Headers.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                    'enum' => [
                        0,
                        1,
                        2,
                    ],
                ],
                'snmp_oid' => [
                    'type' => 'string',
                    'description' => 'SNMP OID.

Property behavior:
- required if type is set to "SNMP agent"
- read-only for inherited objects or discovered objects',
                ],
                'ssl_cert_file' => [
                    'type' => 'string',
                    'description' => 'Public SSL Key file path.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                ],
                'ssl_key_file' => [
                    'type' => 'string',
                    'description' => 'Private SSL Key file path.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                ],
                'ssl_key_password' => [
                    'type' => 'string',
                    'description' => 'Password for SSL Key file.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                ],
                'status' => [
                    'type' => 'integer',
                    'description' => 'Status of the item.

Possible values:
0 - (default) enabled item;
1 - disabled item.',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'status_codes' => [
                    'type' => 'string',
                    'description' => 'Ranges of required HTTP status codes, separated by commas.
Also supports user macros as part of comma separated list.

Example: 200,200-{$M},{$M},200-400

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                ],
                'timeout' => [
                    'type' => 'string',
                    'description' => 'Item data polling request timeout.
Accepts seconds or time unit with suffix (e.g., 30s, 1m). Also accepts user macros.

Possible values range: 1-600s.

Default: "" - use proxy/global settings.

Property behavior:
- supported if type is set to "Zabbix agent" (0), "Simple check" (3) and key_ does not start with "vmware." and "icmpping", "Zabbix agent (active)" (7), "External check" (10), "Database monitor" (11), "SSH agent" (13), "TELNET agent" (14), "HTTP agent" (19), "SNMP agent" (20) and snmp_oid starts with "walk[" or "get[", "Script" (21), "Browser" (22)
- read-only for inherited and discovered objects',
                ],
                'trapper_hosts' => [
                    'type' => 'string',
                    'description' => 'Allowed hosts.

Property behavior:
- readonly for discovered objects
- supported if type is set to "Zabbix trapper", or if type is set to "HTTP agent" and allow_traps is set to "Allow to accept incoming data"',
                ],
                'trends' => [
                    'type' => 'string',
                    'description' => 'A time unit of how long the trends data should be stored.
Also accepts user macro.

Default: 365d.

Property behavior:
- supported if value_type is set to "numeric float" or "numeric unsigned"
- read-only for discovered objects',
                ],
                'units' => [
                    'type' => 'string',
                    'description' => 'Value units.

Property behavior:
- supported if value_type is set to "numeric float" or "numeric unsigned"
- read-only for inherited objects or discovered objects',
                ],
                'username' => [
                    'type' => 'string',
                    'description' => 'Username for authentication.

Property behavior:
- required if type is set to "SSH agent", "TELNET agent", or if type is set to "JMX agent" and password is set
- supported if type is set to "Simple check", "Database monitor", or "HTTP agent"
- read-only for inherited objects (if type is set to "HTTP agent") or discovered objects',
                ],
                'uuid' => [
                    'type' => 'string',
                    'description' => 'Universal unique identifier, used for linking imported item to already existing ones. Auto-generated, if not given.

Property behavior:
- supported if the item belongs to a template',
                ],
                'valuemapid' => [
                    'type' => 'string',
                    'description' => 'ID of the associated value map.

Property behavior:
- supported if value_type is set to "numeric float", "character", or "numeric unsigned"
- read-only for inherited objects or discovered objects',
                ],
                'verify_host' => [
                    'type' => 'integer',
                    'description' => 'Whether to validate that the host name for the connection matches the one in the host\'s certificate.

Possible values:
0 - (default) Do not validate;
1 - Validate.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'verify_peer' => [
                    'type' => 'integer',
                    'description' => 'Whether to validate that the host\'s certificate is authentic.

Possible values:
0 - (default) Do not validate;
1 - Validate.

Property behavior:
- supported if type is set to "HTTP agent"
- read-only for inherited objects or discovered objects',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'preprocessing' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'object',
                        'properties' => [
                            'type' => [
                                'type' => 'integer',
                                'description' => 'The preprocessing option type.

Possible values:
1 - Custom multiplier;
2 - Right trim;
3 - Left trim;
4 - Trim;
5 - Regular expression;
6 - Boolean to decimal;
7 - Octal to decimal;
8 - Hexadecimal to decimal;
9 - Simple change;
10 - Change per second;
11 - XML XPath;
12 - JSONPath;
13 - In range;
14 - Matches regular expression;
15 - Does not match regular expression;
16 - Check for error in JSON;
17 - Check for error in XML;
18 - Check for error using regular expression;
19 - Discard unchanged;
20 - Discard unchanged with heartbeat;
21 - JavaScript;
22 - Prometheus pattern;
23 - Prometheus to JSON;
24 - CSV to JSON;
25 - Replace;
26 - Check unsupported;
27 - XML to JSON;
28 - SNMP walk value;
29 - SNMP walk to JSON;
30 - SNMP get value.

Property behavior:
- required',
                                'enum' => [
                                    1,
                                    2,
                                    3,
                                    4,
                                    5,
                                    6,
                                    7,
                                    8,
                                    9,
                                    10,
                                    11,
                                    12,
                                    13,
                                    14,
                                    15,
                                    16,
                                    17,
                                    18,
                                    19,
                                    20,
                                    21,
                                    22,
                                    23,
                                    24,
                                    25,
                                    26,
                                    27,
                                    28,
                                    29,
                                    30,
                                ],
                            ],
                            'params' => [
                                'type' => 'string',
                                'description' => 'Additional parameters used by preprocessing option.
Multiple parameters are separated by the newline (\\n) character.

If type is set to "Check unsupported", the parameters follow a <scope>[\\n<pattern>] syntax, where pattern is a regular expression, and scope is one of:
-1 - match any error;
\\ 0 - check if error message matches pattern;
\\ 1 - check if error message does not match pattern.

Property behavior:
- required if type is set to "Custom multiplier" (1), "Right trim" (2), "Left trim" (3), "Trim" (4), "Regular expression" (5), "XML XPath" (11), "JSONPath" (12), "In range" (13), "Matches regular expression" (14), "Does not match regular expression" (15), "Check for error in JSON" (16), "Check for error in XML" (17), "Check for error using regular expression" (18), "Discard unchanged with heartbeat" (20), "JavaScript" (21), "Prometheus pattern" (22), "Prometheus to JSON" (23), "CSV to JSON" (24), "Replace" (25), Check unsupported (26), "SNMP walk value" (28), "SNMP walk to JSON" (29), or "SNMP get value" (30)',
                            ],
                            'error_handler' => [
                                'type' => 'integer',
                                'description' => 'Action type used in case of preprocessing step failure.

Possible values:
0 - Error message is set by Zabbix server;
1 - Discard value;
2 - Set custom value;
3 - Set custom error message.

Possible values if type is set to "Check unsupported":
1 - Discard value;
2 - Set custom value;
3 - Set custom error message.

Property behavior:
- required if type is set to "Custom multiplier" (1), "Regular expression" (5), "Boolean to decimal" (6), "Octal to decimal" (7), "Hexadecimal to decimal" (8), "Simple change" (9), "Change per second" (10), "XML XPath" (11), "JSONPath" (12), "In range" (13), "Matches regular expression" (14), "Does not match regular expression" (15), "Check for error in JSON" (16), "Check for error in XML" (17), "Check for error using regular expression" (18), "Prometheus pattern" (22), "Prometheus to JSON" (23), "CSV to JSON" (24), "Check unsupported" (26), "XML to JSON" (27), "SNMP walk value" (28), "SNMP walk to JSON" (29), or "SNMP get value" (30)',
                                'enum' => [
                                    0,
                                    1,
                                    2,
                                    3,
                                ],
                            ],
                            'error_handler_params' => [
                                'type' => 'string',
                                'description' => 'Error handler parameters.

Property behavior:
- required if error_handler is set to "Set custom value" or "Set custom error message"',
                            ],
                        ],
                        'required' => [
                            'type',
                        ],
                        'additionalProperties' => false,
                    ],
                    'description' => 'Item preprocessing options to replace the current preprocessing options.

Parameter behavior:
- read-only for inherited objects or discovered objects',
                ],
                'tags' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'object',
                        'properties' => [
                            'tag' => [
                                'type' => 'string',
                                'description' => 'Item tag name.

Property behavior:
- required',
                            ],
                            'value' => [
                                'type' => 'string',
                                'description' => 'Item tag value.',
                            ],
                        ],
                        'required' => [
                            'tag',
                        ],
                        'additionalProperties' => false,
                    ],
                    'description' => 'Item tags.

Parameter behavior:
- read-only for discovered objects',
                ],
            ],
            'required' => [
                'itemid',
            ],
            'additionalProperties' => false,
        ];
    }
}
