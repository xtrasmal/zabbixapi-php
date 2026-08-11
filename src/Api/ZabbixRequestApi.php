<?php

declare(strict_types=1);

namespace IntelliTrend\Zabbix\Api;

final class ZabbixRequestApi
{
    public readonly ActionApi $actions;
    public readonly AlertApi $alerts;
    public readonly ApiInfoApi $apiInfo;
    public readonly AuditLogApi $auditLogs;
    public readonly AuthenticationApi $authentication;
    public readonly AutoregistrationApi $autoregistration;
    public readonly ConnectorApi $connectors;
    public readonly CorrelationApi $correlations;
    public readonly DashboardApi $dashboards;
    public readonly DCheckApi $dchecks;
    public readonly DHostApi $dhosts;
    public readonly DiscoveryRuleApi $discoveryRules;
    public readonly DRuleApi $drules;
    public readonly DServiceApi $dservices;
    public readonly EventApi $events;
    public readonly GraphItemApi $graphItems;
    public readonly GraphPrototypeApi $graphPrototypes;
    public readonly GraphApi $graphs;
    public readonly HaNodeApi $haNodes;
    public readonly HistoryApi $history;
    public readonly HostGroupApi $hostGroups;
    public readonly HostInterfaceApi $hostInterfaces;
    public readonly HostPrototypeApi $hostPrototypes;
    public readonly HostApi $hosts;
    public readonly HousekeepingApi $housekeeping;
    public readonly HttpTestApi $httpTests;
    public readonly IconMapApi $iconMaps;
    public readonly ImageApi $images;
    public readonly ItemPrototypeApi $itemPrototypes;
    public readonly ItemApi $items;
    public readonly MaintenanceApi $maintenance;
    public readonly MapApi $maps;
    public readonly MediaTypeApi $mediaTypes;
    public readonly MfaApi $mfa;
    public readonly ModuleApi $modules;
    public readonly ProblemApi $problems;
    public readonly ProxyApi $proxies;
    public readonly ProxyGroupApi $proxyGroups;
    public readonly RegexpApi $regexps;
    public readonly ReportApi $reports;
    public readonly RoleApi $roles;
    public readonly ScriptApi $scripts;
    public readonly ServiceApi $services;
    public readonly SettingsApi $settings;
    public readonly SlaApi $slas;
    public readonly TaskApi $tasks;
    public readonly TemplateDashboardApi $templateDashboards;
    public readonly TemplateGroupApi $templateGroups;
    public readonly TemplateApi $templates;
    public readonly TokenApi $tokens;
    public readonly TrendApi $trends;
    public readonly TriggerPrototypeApi $triggerPrototypes;
    public readonly TriggerApi $triggers;
    public readonly UserDirectoryApi $userDirectories;
    public readonly UserGroupApi $userGroups;
    public readonly UserMacroApi $userMacros;
    public readonly UserApi $users;
    public readonly ValueMapApi $valueMaps;

    public function __construct()
    {
        $this->actions = new ActionApi();
        $this->alerts = new AlertApi();
        $this->apiInfo = new ApiInfoApi();
        $this->auditLogs = new AuditLogApi();
        $this->authentication = new AuthenticationApi();
        $this->autoregistration = new AutoregistrationApi();
        $this->connectors = new ConnectorApi();
        $this->correlations = new CorrelationApi();
        $this->dashboards = new DashboardApi();
        $this->dchecks = new DCheckApi();
        $this->dhosts = new DHostApi();
        $this->discoveryRules = new DiscoveryRuleApi();
        $this->drules = new DRuleApi();
        $this->dservices = new DServiceApi();
        $this->events = new EventApi();
        $this->graphItems = new GraphItemApi();
        $this->graphPrototypes = new GraphPrototypeApi();
        $this->graphs = new GraphApi();
        $this->haNodes = new HaNodeApi();
        $this->history = new HistoryApi();
        $this->hostGroups = new HostGroupApi();
        $this->hostInterfaces = new HostInterfaceApi();
        $this->hostPrototypes = new HostPrototypeApi();
        $this->hosts = new HostApi();
        $this->housekeeping = new HousekeepingApi();
        $this->httpTests = new HttpTestApi();
        $this->iconMaps = new IconMapApi();
        $this->images = new ImageApi();
        $this->itemPrototypes = new ItemPrototypeApi();
        $this->items = new ItemApi();
        $this->maintenance = new MaintenanceApi();
        $this->maps = new MapApi();
        $this->mediaTypes = new MediaTypeApi();
        $this->mfa = new MfaApi();
        $this->modules = new ModuleApi();
        $this->problems = new ProblemApi();
        $this->proxies = new ProxyApi();
        $this->proxyGroups = new ProxyGroupApi();
        $this->regexps = new RegexpApi();
        $this->reports = new ReportApi();
        $this->roles = new RoleApi();
        $this->scripts = new ScriptApi();
        $this->services = new ServiceApi();
        $this->settings = new SettingsApi();
        $this->slas = new SlaApi();
        $this->tasks = new TaskApi();
        $this->templateDashboards = new TemplateDashboardApi();
        $this->templateGroups = new TemplateGroupApi();
        $this->templates = new TemplateApi();
        $this->tokens = new TokenApi();
        $this->trends = new TrendApi();
        $this->triggerPrototypes = new TriggerPrototypeApi();
        $this->triggers = new TriggerApi();
        $this->userDirectories = new UserDirectoryApi();
        $this->userGroups = new UserGroupApi();
        $this->userMacros = new UserMacroApi();
        $this->users = new UserApi();
        $this->valueMaps = new ValueMapApi();
    }

    public function actions(): ActionApi
    {
        return $this->actions;
    }

    public function alerts(): AlertApi
    {
        return $this->alerts;
    }

    public function apiInfo(): ApiInfoApi
    {
        return $this->apiInfo;
    }

    public function auditLogs(): AuditLogApi
    {
        return $this->auditLogs;
    }

    public function authentication(): AuthenticationApi
    {
        return $this->authentication;
    }

    public function autoregistration(): AutoregistrationApi
    {
        return $this->autoregistration;
    }

    public function connectors(): ConnectorApi
    {
        return $this->connectors;
    }

    public function correlations(): CorrelationApi
    {
        return $this->correlations;
    }

    public function dashboards(): DashboardApi
    {
        return $this->dashboards;
    }

    public function dchecks(): DCheckApi
    {
        return $this->dchecks;
    }

    public function dhosts(): DHostApi
    {
        return $this->dhosts;
    }

    public function discoveryRules(): DiscoveryRuleApi
    {
        return $this->discoveryRules;
    }

    public function drules(): DRuleApi
    {
        return $this->drules;
    }

    public function dservices(): DServiceApi
    {
        return $this->dservices;
    }

    public function events(): EventApi
    {
        return $this->events;
    }

    public function graphItems(): GraphItemApi
    {
        return $this->graphItems;
    }

    public function graphPrototypes(): GraphPrototypeApi
    {
        return $this->graphPrototypes;
    }

    public function graphs(): GraphApi
    {
        return $this->graphs;
    }

    public function haNodes(): HaNodeApi
    {
        return $this->haNodes;
    }

    public function history(): HistoryApi
    {
        return $this->history;
    }

    public function hostGroups(): HostGroupApi
    {
        return $this->hostGroups;
    }

    public function hostInterfaces(): HostInterfaceApi
    {
        return $this->hostInterfaces;
    }

    public function hostPrototypes(): HostPrototypeApi
    {
        return $this->hostPrototypes;
    }

    public function hosts(): HostApi
    {
        return $this->hosts;
    }

    public function housekeeping(): HousekeepingApi
    {
        return $this->housekeeping;
    }

    public function httpTests(): HttpTestApi
    {
        return $this->httpTests;
    }

    public function iconMaps(): IconMapApi
    {
        return $this->iconMaps;
    }

    public function images(): ImageApi
    {
        return $this->images;
    }

    public function itemPrototypes(): ItemPrototypeApi
    {
        return $this->itemPrototypes;
    }

    public function items(): ItemApi
    {
        return $this->items;
    }

    public function maintenance(): MaintenanceApi
    {
        return $this->maintenance;
    }

    public function maps(): MapApi
    {
        return $this->maps;
    }

    public function mediaTypes(): MediaTypeApi
    {
        return $this->mediaTypes;
    }

    public function mfa(): MfaApi
    {
        return $this->mfa;
    }

    public function modules(): ModuleApi
    {
        return $this->modules;
    }

    public function problems(): ProblemApi
    {
        return $this->problems;
    }

    public function proxies(): ProxyApi
    {
        return $this->proxies;
    }

    public function proxyGroups(): ProxyGroupApi
    {
        return $this->proxyGroups;
    }

    public function regexps(): RegexpApi
    {
        return $this->regexps;
    }

    public function reports(): ReportApi
    {
        return $this->reports;
    }

    public function roles(): RoleApi
    {
        return $this->roles;
    }

    public function scripts(): ScriptApi
    {
        return $this->scripts;
    }

    public function services(): ServiceApi
    {
        return $this->services;
    }

    public function settings(): SettingsApi
    {
        return $this->settings;
    }

    public function slas(): SlaApi
    {
        return $this->slas;
    }

    public function tasks(): TaskApi
    {
        return $this->tasks;
    }

    public function templateDashboards(): TemplateDashboardApi
    {
        return $this->templateDashboards;
    }

    public function templateGroups(): TemplateGroupApi
    {
        return $this->templateGroups;
    }

    public function templates(): TemplateApi
    {
        return $this->templates;
    }

    public function tokens(): TokenApi
    {
        return $this->tokens;
    }

    public function trends(): TrendApi
    {
        return $this->trends;
    }

    public function triggerPrototypes(): TriggerPrototypeApi
    {
        return $this->triggerPrototypes;
    }

    public function triggers(): TriggerApi
    {
        return $this->triggers;
    }

    public function userDirectories(): UserDirectoryApi
    {
        return $this->userDirectories;
    }

    public function userGroups(): UserGroupApi
    {
        return $this->userGroups;
    }

    public function userMacros(): UserMacroApi
    {
        return $this->userMacros;
    }

    public function users(): UserApi
    {
        return $this->users;
    }

    public function valueMaps(): ValueMapApi
    {
        return $this->valueMaps;
    }
}
