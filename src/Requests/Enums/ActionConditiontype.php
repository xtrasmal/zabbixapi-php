<?php declare(strict_types=1);

namespace IntelliTrend\Zabbix\Requests\Enums;

/**
 * Type of condition. Possible values if eventsource of Action object is set to "event created by a trigger": 0 - host group; 1 - host; 2 - trigger; 3 - event name; 4 - trigger severity; 6 - time period; 13 - host template; 16 - problem is suppressed; 25 - event tag; 26 - event tag value. Possible values if eventsource of Action object is set to "event created by a discovery rule": 7 - host IP; 8 - discovered service type; 9 - discovered service port; 10 - discovery status; 11 - uptime or downtime duration; 12 - received value; 18 - discovery rule; 19 - discovery check; 20 - proxy; 21 - discovery object. Possible values if eventsource of Action object is set to "event created by active agent autoregistration": 20 - proxy; 22 - host name; 24 - host metadata. Possible values if eventsource of Action object is set to "internal event": 0 - host group; 1 - host; 13 - host template; 23 - event type; 25 - event tag; 26 - event tag value. Possible values if eventsource of Action object is set to "event created on service status update": 25 - event tag; 26 - event tag value; 27 - service; 28 - service name. Full reference (condition id - condition name - expected value): 0 - Host group - Host group ID; 1 - Host - Host ID; 2 - Trigger - Trigger ID; 3 - Event name - Event name; 4 - Trigger severity - Trigger severity; 5 - Trigger value - Trigger value; 6 - Time period - Time period; 7 - Host IP - IP range(s); 8 - Discovered service type - discovery check type; 9 - Discovered service port - port range(s); 10 - Discovery status - status of a discovered object; 11 - Uptime or downtime duration - duration in seconds; 12 - Received values - value returned by a discovery check; 13 - Host template - Template ID; 16 - Problem is suppressed - no value required, only operator; 18 - Discovery rule - Discovery rule ID; 19 - Discovery check - Discovery check ID; 20 - Proxy - Proxy ID; 21 - Discovery object - type of object that triggered the discovery event; 22 - Host name - host name; 23 - Event type - specific internal event; 24 - Host metadata - metadata of the auto-registered host; 25 - Tag - event tag; 26 - Tag value - event tag value; 27 - Service - Service ID; 28 - Service name - Service name.
 */
enum ActionConditiontype: int
{
    case HostGroupHostGroupId = 0;
    case HostHostId = 1;
    case TriggerTriggerId = 2;
    case EventNameEventName = 3;
    case TriggerSeverityTriggerSeverity = 4;
    case TriggerValueTriggerValue = 5;
    case TimePeriodTimePeriod = 6;
    case HostIpIpRangeS = 7;
    case DiscoveredServiceTypeDiscoveryCheck = 8;
    case DiscoveredServicePortPortRange = 9;
    case DiscoveryStatusStatusOfA = 10;
    case UptimeOrDowntimeDurationDuration = 11;
    case ReceivedValuesValueReturnedBy = 12;
    case HostTemplateTemplateId = 13;
    case ProblemIsSuppressedNoValue = 16;
    case DiscoveryRuleDiscoveryRuleId = 18;
    case DiscoveryCheckDiscoveryCheckId = 19;
    case ProxyProxyId = 20;
    case DiscoveryObjectTypeOfObject = 21;
    case HostNameHostName = 22;
    case EventTypeSpecificInternalEvent = 23;
    case HostMetadataMetadataOfThe = 24;
    case TagEventTag = 25;
    case TagValueEventTagValue = 26;
    case ServiceServiceId = 27;
    case ServiceNameServiceName = 28;
}
