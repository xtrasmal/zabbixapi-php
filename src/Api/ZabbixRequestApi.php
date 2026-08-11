<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

final class ZabbixRequestApi
{
    public function actions(): ActionApi
    {
        return new ActionApi();
    }

    public function alerts(): AlertApi
    {
        return new AlertApi();
    }

    public function apiInfo(): ApiInfoApi
    {
        return new ApiInfoApi();
    }

    public function auditLogs(): AuditLogApi
    {
        return new AuditLogApi();
    }

    public function authentication(): AuthenticationApi
    {
        return new AuthenticationApi();
    }

    public function autoregistration(): AutoregistrationApi
    {
        return new AutoregistrationApi();
    }

    public function connectors(): ConnectorApi
    {
        return new ConnectorApi();
    }

    public function correlations(): CorrelationApi
    {
        return new CorrelationApi();
    }

    public function dashboards(): DashboardApi
    {
        return new DashboardApi();
    }

    public function dchecks(): DCheckApi
    {
        return new DCheckApi();
    }

    public function dhosts(): DHostApi
    {
        return new DHostApi();
    }

    public function discoveryRules(): DiscoveryRuleApi
    {
        return new DiscoveryRuleApi();
    }

    public function drules(): DRuleApi
    {
        return new DRuleApi();
    }

    public function dservices(): DServiceApi
    {
        return new DServiceApi();
    }

    public function events(): EventApi
    {
        return new EventApi();
    }

    public function graphItems(): GraphItemApi
    {
        return new GraphItemApi();
    }

    public function graphPrototypes(): GraphPrototypeApi
    {
        return new GraphPrototypeApi();
    }

    public function graphs(): GraphApi
    {
        return new GraphApi();
    }

    public function haNodes(): HaNodeApi
    {
        return new HaNodeApi();
    }

    public function history(): HistoryApi
    {
        return new HistoryApi();
    }

    public function hostGroups(): HostGroupApi
    {
        return new HostGroupApi();
    }

    public function hostInterfaces(): HostInterfaceApi
    {
        return new HostInterfaceApi();
    }

    public function hostPrototypes(): HostPrototypeApi
    {
        return new HostPrototypeApi();
    }

    public function hosts(): HostApi
    {
        return new HostApi();
    }

    public function housekeeping(): HousekeepingApi
    {
        return new HousekeepingApi();
    }

    public function httpTests(): HttpTestApi
    {
        return new HttpTestApi();
    }

    public function iconMaps(): IconMapApi
    {
        return new IconMapApi();
    }

    public function images(): ImageApi
    {
        return new ImageApi();
    }

    public function itemPrototypes(): ItemPrototypeApi
    {
        return new ItemPrototypeApi();
    }

    public function items(): ItemApi
    {
        return new ItemApi();
    }

    public function maintenance(): MaintenanceApi
    {
        return new MaintenanceApi();
    }

    public function maps(): MapApi
    {
        return new MapApi();
    }

    public function mediaTypes(): MediaTypeApi
    {
        return new MediaTypeApi();
    }

    public function mfa(): MfaApi
    {
        return new MfaApi();
    }

    public function modules(): ModuleApi
    {
        return new ModuleApi();
    }

    public function problems(): ProblemApi
    {
        return new ProblemApi();
    }

    public function proxies(): ProxyApi
    {
        return new ProxyApi();
    }

    public function proxyGroups(): ProxyGroupApi
    {
        return new ProxyGroupApi();
    }

    public function regexps(): RegexpApi
    {
        return new RegexpApi();
    }

    public function reports(): ReportApi
    {
        return new ReportApi();
    }

    public function roles(): RoleApi
    {
        return new RoleApi();
    }

    public function scripts(): ScriptApi
    {
        return new ScriptApi();
    }

    public function services(): ServiceApi
    {
        return new ServiceApi();
    }

    public function settings(): SettingsApi
    {
        return new SettingsApi();
    }

    public function slas(): SlaApi
    {
        return new SlaApi();
    }

    public function tasks(): TaskApi
    {
        return new TaskApi();
    }

    public function templateDashboards(): TemplateDashboardApi
    {
        return new TemplateDashboardApi();
    }

    public function templateGroups(): TemplateGroupApi
    {
        return new TemplateGroupApi();
    }

    public function templates(): TemplateApi
    {
        return new TemplateApi();
    }

    public function tokens(): TokenApi
    {
        return new TokenApi();
    }

    public function trends(): TrendApi
    {
        return new TrendApi();
    }

    public function triggerPrototypes(): TriggerPrototypeApi
    {
        return new TriggerPrototypeApi();
    }

    public function triggers(): TriggerApi
    {
        return new TriggerApi();
    }

    public function userDirectories(): UserDirectoryApi
    {
        return new UserDirectoryApi();
    }

    public function userGroups(): UserGroupApi
    {
        return new UserGroupApi();
    }

    public function userMacros(): UserMacroApi
    {
        return new UserMacroApi();
    }

    public function users(): UserApi
    {
        return new UserApi();
    }

    public function valueMaps(): ValueMapApi
    {
        return new ValueMapApi();
    }
}
