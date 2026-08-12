<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * Name of the action. Possible values if type of the Role object is "User", "Admin", or "Super admin": edit_dashboards - Create and edit dashboards; edit_maps - Create and edit maps; add_problem_comments - Add problem comments; change_severity - Change problem severity; acknowledge_problems - Acknowledge problems; suppress_problems - Suppress problems; close_problems - Close problems; execute_scripts - Execute scripts; manage_api_tokens - Manage API tokens; change_problem_ranking - Change the problem ranking from cause to symptom, and vice versa. Possible values if type is "Admin" or "Super admin": edit_maintenance - Create and edit maintenances; manage_scheduled_reports - Manage scheduled reports; manage_sla - Manage SLA. Possible values if type is "User" or "Admin": invoke_execute_now - allows to execute item checks for users that have only read permissions on host. Property behavior: required.
 */
enum RoleName: string
{
    case EditDashboards = 'edit_dashboards';
    case EditMaps = 'edit_maps';
    case AddProblemComments = 'add_problem_comments';
    case ChangeSeverity = 'change_severity';
    case AcknowledgeProblems = 'acknowledge_problems';
    case SuppressProblems = 'suppress_problems';
    case CloseProblems = 'close_problems';
    case ExecuteScripts = 'execute_scripts';
    case ManageApiTokens = 'manage_api_tokens';
    case ChangeProblemRanking = 'change_problem_ranking';
    case EditMaintenance = 'edit_maintenance';
    case ManageScheduledReports = 'manage_scheduled_reports';
    case ManageSla = 'manage_sla';
    case InvokeExecuteNow = 'invoke_execute_now';
}
