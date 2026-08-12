<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Whether to pause escalation if event is a symptom event. Possible values: 0 - don't pause escalation for symptom problems; 1 - (default) pause escalation for symptom problems. Property behavior: supported if eventsource is set to "event created by a trigger".
 */
enum PauseSymptoms: int
{
    case DonTPauseEscalationFor = 0;
    case PauseEscalationForSymptomProblems = 1;
}
