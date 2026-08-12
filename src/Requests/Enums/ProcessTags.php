<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Process JSON property values in Webhook script response as tags. These tags are added to any existing problem tags.  Possible values: 0 - (default) Ignore webhook script response; 1 - Process webhook script response as tags.  Property behavior: - supported if type is set to "Webhook"
 */
enum ProcessTags: int
{
    case IgnoreWebhookScriptResponse = 0;
    case ProcessWebhookScriptResponseAs = 1;
}
