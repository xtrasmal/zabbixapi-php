<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Schemas;

use Idiot\Zabbix\Requests\RequestSchema;

final class MediatypeCreateSchema extends RequestSchema
{
    /**
     * Draft 2020-12 schema for mediatype.create, compiled from the source JSON at
     * build time. No JSON is read at runtime.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            '$schema' => 'https://json-schema.org/draft/2020-12/schema',
            '$id' => 'https://zabbix.com/7.0/api/mediatype/mediatype.create',
            'title' => 'mediatype.create',
            'description' => 'Create new media types.',
            '$comment' => 'Source: https://www.zabbix.com/documentation/7.0/en/manual/api/reference/mediatype/create',
            'type' => 'object',
            'properties' => [
                'name' => [
                    'type' => 'string',
                    'description' => 'Name of the media type.

Property behavior:
- required for create operations',
                ],
                'type' => [
                    'type' => 'integer',
                    'description' => 'Transport used by the media type.

Possible values:
0 - Email;
1 - Script;
2 - SMS;
4 - Webhook.

Property behavior:
- required for create operations',
                    'enum' => [
                        0,
                        1,
                        2,
                        4,
                    ],
                ],
                'exec_path' => [
                    'type' => 'string',
                    'description' => 'Name of the script file (e.g., notification.sh) that is located in the directory specified in the AlertScriptsPath server configuration parameter.

Property behavior:
- required if type is set to "Script"',
                ],
                'gsm_modem' => [
                    'type' => 'string',
                    'description' => 'Serial device name of the GSM modem.

Property behavior:
- required if type is set to "SMS"',
                ],
                'passwd' => [
                    'type' => 'string',
                    'description' => 'Authentication password.

Property behavior:
- supported if smtp_authentication is set to "Normal password"',
                ],
                'provider' => [
                    'type' => 'integer',
                    'description' => 'Email provider.

Possible values:
0 - (default) Generic SMTP;
1 - Gmail;
2 - Gmail relay;
3 - Office365;
4 - Office365 relay.',
                    'enum' => [
                        0,
                        1,
                        2,
                        3,
                        4,
                    ],
                ],
                'smtp_email' => [
                    'type' => 'string',
                    'description' => 'Email address from which notifications will be sent.

Property behavior:
- required if type is set to "Email"',
                ],
                'smtp_helo' => [
                    'type' => 'string',
                    'description' => 'SMTP HELO.

Property behavior:
- supported if type is set to "Email"',
                ],
                'smtp_server' => [
                    'type' => 'string',
                    'description' => 'SMTP server.

Property behavior:
- required if type is set to "Email"',
                ],
                'smtp_port' => [
                    'type' => 'integer',
                    'description' => 'SMTP server port to connect to.

Default: 25.

Property behavior:
- supported if type is set to "Email"',
                ],
                'smtp_security' => [
                    'type' => 'integer',
                    'description' => 'SMTP connection security level to use.

Possible values:
0 - (default) None;
1 - STARTTLS;
2 - SSL/TLS.

Property behavior:
- supported if type is set to "Email"',
                    'enum' => [
                        0,
                        1,
                        2,
                    ],
                ],
                'smtp_verify_host' => [
                    'type' => 'integer',
                    'description' => 'SSL verify host for SMTP.

Possible values:
0 - (default) No;
1 - Yes.

Property behavior:
- supported if smtp_security is set to "STARTTLS" or "SSL/TLS"',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'smtp_verify_peer' => [
                    'type' => 'integer',
                    'description' => 'SSL verify peer for SMTP.

Possible values:
0 - (default) No;
1 - Yes.

Property behavior:
- supported if smtp_security is set to "STARTTLS" or "SSL/TLS"',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'smtp_authentication' => [
                    'type' => 'integer',
                    'description' => 'SMTP authentication method to use.

Possible values:
0 - (default) None;
1 - Normal password.

Property behavior:
- supported if type is set to "Email"',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'status' => [
                    'type' => 'integer',
                    'description' => 'Whether the media type is enabled.

Possible values:
0 - (default) Enabled;
1 - Disabled.',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'username' => [
                    'type' => 'string',
                    'description' => 'User name.

Property behavior:
- supported if smtp_authentication is set to "Normal password"',
                ],
                'maxsessions' => [
                    'type' => 'integer',
                    'description' => 'The maximum number of alerts that can be processed in parallel.

Possible values if type is set to "SMS": 1.

Possible values if type is set to "Email", "Script", or "Webhook": 0-100.

Default: 1.',
                ],
                'maxattempts' => [
                    'type' => 'integer',
                    'description' => 'The maximum number of attempts to send an alert.

Possible values: 1-100.

Default: 3.',
                ],
                'attempt_interval' => [
                    'type' => 'string',
                    'description' => 'The interval between retry attempts.
Accepts seconds and time unit with suffix.

Possible values: 0-1h.

Default: 10s.',
                ],
                'content_type' => [
                    'type' => 'integer',
                    'description' => 'Deprecated. Please use message_format instead.
Message format.

Possible values:
0 - Plain text;
1 - (default) HTML.

Property behavior:
- supported if type is set to "Email"',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'message_format' => [
                    'type' => 'integer',
                    'description' => 'Message format.

Possible values:
0 - Plain text;
1 - (default) HTML.

Property behavior:
- supported if type is set to "Email"',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'script' => [
                    'type' => 'string',
                    'description' => 'Webhook script body (JavaScript).

Property behavior:
- required if type is set to "Webhook"',
                ],
                'timeout' => [
                    'type' => 'string',
                    'description' => 'Webhook script timeout.
Accepts seconds and time unit with suffix.

Possible values: 1-60s.

Default: 30s.

Property behavior:
- supported if type is set to "Webhook"',
                ],
                'process_tags' => [
                    'type' => 'integer',
                    'description' => 'Process JSON property values in Webhook script response as tags. These tags are added to any existing problem tags.

Possible values:
0 - (default) Ignore webhook script response;
1 - Process webhook script response as tags.

Property behavior:
- supported if type is set to "Webhook"',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'show_event_menu' => [
                    'type' => 'integer',
                    'description' => 'Include an entry in the event menu that links to a custom URL. Also adds the urls property to the output of problem.get and event.get.

Possible values:
0 - (default) Do not include event menu entry or urls property;
1 - Include event menu entry and urls property.

Property behavior:
- supported if type is set to "Webhook"',
                    'enum' => [
                        0,
                        1,
                    ],
                ],
                'event_menu_url' => [
                    'type' => 'string',
                    'description' => 'URL used in the event menu entry and in the urls property returned by problem.get and event.get.

Property behavior:
- supported if show_event_menu is set to "Include event menu entry and urls property"',
                ],
                'event_menu_name' => [
                    'type' => 'string',
                    'description' => 'Name used for the event menu entry and in the urls property returned by problem.get and event.get.

Property behavior:
- supported if show_event_menu is set to "Include event menu entry and urls property"',
                ],
                'parameters' => [
                    'type' => 'array',
                    'description' => 'Webhook or script parameters.

Property behavior:
- supported if type is set to "Webhook" or "Script"',
                    'items' => [
                        'oneOf' => [
                            [
                                'type' => 'object',
                                'description' => 'Script parameter.',
                                'properties' => [
                                    'sortorder' => [
                                        'type' => 'integer',
                                        'description' => 'The order in which parameter values will be passed to the script as command-line arguments, starting with 0 as the first one.

Property behavior:
- required',
                                    ],
                                    'value' => [
                                        'type' => 'string',
                                        'description' => 'Parameter value, supports macros.',
                                    ],
                                ],
                                'required' => [
                                    'sortorder',
                                ],
                                'additionalProperties' => false,
                            ],
                            [
                                'type' => 'object',
                                'description' => 'Webhook parameter.',
                                'properties' => [
                                    'name' => [
                                        'type' => 'string',
                                        'description' => 'Parameter name.

Property behavior:
- required',
                                    ],
                                    'value' => [
                                        'type' => 'string',
                                        'description' => 'Parameter value, supports macros.',
                                    ],
                                ],
                                'required' => [
                                    'name',
                                ],
                                'additionalProperties' => false,
                            ],
                        ],
                    ],
                ],
                'description' => [
                    'type' => 'string',
                    'description' => 'Media type description.',
                ],
                'message_templates' => [
                    'type' => 'array',
                    'description' => 'Message templates to be created for the media type.',
                    'items' => [
                        'type' => 'object',
                        'properties' => [
                            'eventsource' => [
                                'type' => 'integer',
                                'description' => 'Event source.

Possible values:
0 - Triggers;
1 - Discovery;
2 - Autoregistration;
3 - Internal;
4 - Services.

Property behavior:
- required',
                                'enum' => [
                                    0,
                                    1,
                                    2,
                                    3,
                                    4,
                                ],
                            ],
                            'recovery' => [
                                'type' => 'integer',
                                'description' => 'Operation mode.

Possible values:
0 - Operations;
1 - Recovery operations;
2 - Update operations.

Property behavior:
- required',
                                'enum' => [
                                    0,
                                    1,
                                    2,
                                ],
                            ],
                            'subject' => [
                                'type' => 'string',
                                'description' => 'Message subject.',
                            ],
                            'message' => [
                                'type' => 'string',
                                'description' => 'Message text.',
                            ],
                        ],
                        'required' => [
                            'eventsource',
                            'recovery',
                        ],
                        'additionalProperties' => false,
                    ],
                ],
            ],
            'required' => [
                'name',
                'type',
            ],
            'additionalProperties' => false,
        ];
    }
}
