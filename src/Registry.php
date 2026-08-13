<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use Idiot\Zabbix\Api\Requests\AbstractRequest;
use InvalidArgumentException;

/**
 * Registry of generated Zabbix request classes.
 */
final class Registry
{
    /** @var array<string, class-string<AbstractRequest>> */
    private const REQUEST_CLASSES = [
        'action.create' => Api\Requests\ActionCreateRequest::class,
        'action.delete' => Api\Requests\ActionDeleteRequest::class,
        'action.get' => Api\Requests\ActionGetRequest::class,
        'action.update' => Api\Requests\ActionUpdateRequest::class,
        'alert.get' => Api\Requests\AlertGetRequest::class,
        'apiinfo.version' => Api\Requests\ApiinfoVersionRequest::class,
        'auditlog.get' => Api\Requests\AuditlogGetRequest::class,
        'authentication.get' => Api\Requests\AuthenticationGetRequest::class,
        'authentication.update' => Api\Requests\AuthenticationUpdateRequest::class,
        'autoregistration.get' => Api\Requests\AutoregistrationGetRequest::class,
        'autoregistration.update' => Api\Requests\AutoregistrationUpdateRequest::class,
        'connector.create' => Api\Requests\ConnectorCreateRequest::class,
        'connector.delete' => Api\Requests\ConnectorDeleteRequest::class,
        'connector.get' => Api\Requests\ConnectorGetRequest::class,
        'connector.update' => Api\Requests\ConnectorUpdateRequest::class,
        'correlation.create' => Api\Requests\CorrelationCreateRequest::class,
        'correlation.delete' => Api\Requests\CorrelationDeleteRequest::class,
        'correlation.get' => Api\Requests\CorrelationGetRequest::class,
        'correlation.update' => Api\Requests\CorrelationUpdateRequest::class,
        'dashboard.create' => Api\Requests\DashboardCreateRequest::class,
        'dashboard.delete' => Api\Requests\DashboardDeleteRequest::class,
        'dashboard.get' => Api\Requests\DashboardGetRequest::class,
        'dashboard.update' => Api\Requests\DashboardUpdateRequest::class,
        'dcheck.get' => Api\Requests\DcheckGetRequest::class,
        'dhost.get' => Api\Requests\DhostGetRequest::class,
        'discoveryrule.copy' => Api\Requests\DiscoveryruleCopyRequest::class,
        'discoveryrule.create' => Api\Requests\DiscoveryruleCreateRequest::class,
        'discoveryrule.delete' => Api\Requests\DiscoveryruleDeleteRequest::class,
        'discoveryrule.get' => Api\Requests\DiscoveryruleGetRequest::class,
        'discoveryrule.update' => Api\Requests\DiscoveryruleUpdateRequest::class,
        'drule.create' => Api\Requests\DruleCreateRequest::class,
        'drule.delete' => Api\Requests\DruleDeleteRequest::class,
        'drule.get' => Api\Requests\DruleGetRequest::class,
        'drule.update' => Api\Requests\DruleUpdateRequest::class,
        'dservice.get' => Api\Requests\DserviceGetRequest::class,
        'event.acknowledge' => Api\Requests\EventAcknowledgeRequest::class,
        'event.get' => Api\Requests\EventGetRequest::class,
        'graph.create' => Api\Requests\GraphCreateRequest::class,
        'graph.delete' => Api\Requests\GraphDeleteRequest::class,
        'graph.get' => Api\Requests\GraphGetRequest::class,
        'graph.update' => Api\Requests\GraphUpdateRequest::class,
        'graphitem.get' => Api\Requests\GraphitemGetRequest::class,
        'graphprototype.create' => Api\Requests\GraphprototypeCreateRequest::class,
        'graphprototype.delete' => Api\Requests\GraphprototypeDeleteRequest::class,
        'graphprototype.get' => Api\Requests\GraphprototypeGetRequest::class,
        'graphprototype.update' => Api\Requests\GraphprototypeUpdateRequest::class,
        'hanode.get' => Api\Requests\HanodeGetRequest::class,
        'history.clear' => Api\Requests\HistoryClearRequest::class,
        'history.get' => Api\Requests\HistoryGetRequest::class,
        'history.push' => Api\Requests\HistoryPushRequest::class,
        'host.create' => Api\Requests\HostCreateRequest::class,
        'host.delete' => Api\Requests\HostDeleteRequest::class,
        'host.get' => Api\Requests\HostGetRequest::class,
        'host.massadd' => Api\Requests\HostMassaddRequest::class,
        'host.massremove' => Api\Requests\HostMassremoveRequest::class,
        'host.massupdate' => Api\Requests\HostMassupdateRequest::class,
        'host.update' => Api\Requests\HostUpdateRequest::class,
        'hostgroup.create' => Api\Requests\HostgroupCreateRequest::class,
        'hostgroup.delete' => Api\Requests\HostgroupDeleteRequest::class,
        'hostgroup.get' => Api\Requests\HostgroupGetRequest::class,
        'hostgroup.massadd' => Api\Requests\HostgroupMassaddRequest::class,
        'hostgroup.massremove' => Api\Requests\HostgroupMassremoveRequest::class,
        'hostgroup.massupdate' => Api\Requests\HostgroupMassupdateRequest::class,
        'hostgroup.propagate' => Api\Requests\HostgroupPropagateRequest::class,
        'hostgroup.update' => Api\Requests\HostgroupUpdateRequest::class,
        'hostinterface.create' => Api\Requests\HostinterfaceCreateRequest::class,
        'hostinterface.delete' => Api\Requests\HostinterfaceDeleteRequest::class,
        'hostinterface.get' => Api\Requests\HostinterfaceGetRequest::class,
        'hostinterface.massadd' => Api\Requests\HostinterfaceMassaddRequest::class,
        'hostinterface.massremove' => Api\Requests\HostinterfaceMassremoveRequest::class,
        'hostinterface.replacehostinterfaces' => Api\Requests\HostinterfaceReplacehostinterfacesRequest::class,
        'hostinterface.update' => Api\Requests\HostinterfaceUpdateRequest::class,
        'hostprototype.create' => Api\Requests\HostprototypeCreateRequest::class,
        'hostprototype.delete' => Api\Requests\HostprototypeDeleteRequest::class,
        'hostprototype.get' => Api\Requests\HostprototypeGetRequest::class,
        'hostprototype.update' => Api\Requests\HostprototypeUpdateRequest::class,
        'housekeeping.get' => Api\Requests\HousekeepingGetRequest::class,
        'housekeeping.update' => Api\Requests\HousekeepingUpdateRequest::class,
        'httptest.create' => Api\Requests\HttptestCreateRequest::class,
        'httptest.delete' => Api\Requests\HttptestDeleteRequest::class,
        'httptest.get' => Api\Requests\HttptestGetRequest::class,
        'httptest.update' => Api\Requests\HttptestUpdateRequest::class,
        'iconmap.create' => Api\Requests\IconmapCreateRequest::class,
        'iconmap.delete' => Api\Requests\IconmapDeleteRequest::class,
        'iconmap.get' => Api\Requests\IconmapGetRequest::class,
        'iconmap.update' => Api\Requests\IconmapUpdateRequest::class,
        'image.create' => Api\Requests\ImageCreateRequest::class,
        'image.delete' => Api\Requests\ImageDeleteRequest::class,
        'image.get' => Api\Requests\ImageGetRequest::class,
        'image.update' => Api\Requests\ImageUpdateRequest::class,
        'item.create' => Api\Requests\ItemCreateRequest::class,
        'item.delete' => Api\Requests\ItemDeleteRequest::class,
        'item.get' => Api\Requests\ItemGetRequest::class,
        'item.update' => Api\Requests\ItemUpdateRequest::class,
        'itemprototype.create' => Api\Requests\ItemprototypeCreateRequest::class,
        'itemprototype.delete' => Api\Requests\ItemprototypeDeleteRequest::class,
        'itemprototype.get' => Api\Requests\ItemprototypeGetRequest::class,
        'itemprototype.update' => Api\Requests\ItemprototypeUpdateRequest::class,
        'maintenance.create' => Api\Requests\MaintenanceCreateRequest::class,
        'maintenance.delete' => Api\Requests\MaintenanceDeleteRequest::class,
        'maintenance.get' => Api\Requests\MaintenanceGetRequest::class,
        'maintenance.update' => Api\Requests\MaintenanceUpdateRequest::class,
        'map.create' => Api\Requests\MapCreateRequest::class,
        'map.delete' => Api\Requests\MapDeleteRequest::class,
        'map.get' => Api\Requests\MapGetRequest::class,
        'map.update' => Api\Requests\MapUpdateRequest::class,
        'mediatype.create' => Api\Requests\MediatypeCreateRequest::class,
        'mediatype.delete' => Api\Requests\MediatypeDeleteRequest::class,
        'mediatype.get' => Api\Requests\MediatypeGetRequest::class,
        'mediatype.update' => Api\Requests\MediatypeUpdateRequest::class,
        'mfa.create' => Api\Requests\MfaCreateRequest::class,
        'mfa.delete' => Api\Requests\MfaDeleteRequest::class,
        'mfa.get' => Api\Requests\MfaGetRequest::class,
        'mfa.update' => Api\Requests\MfaUpdateRequest::class,
        'module.create' => Api\Requests\ModuleCreateRequest::class,
        'module.delete' => Api\Requests\ModuleDeleteRequest::class,
        'module.get' => Api\Requests\ModuleGetRequest::class,
        'module.update' => Api\Requests\ModuleUpdateRequest::class,
        'problem.get' => Api\Requests\ProblemGetRequest::class,
        'proxy.create' => Api\Requests\ProxyCreateRequest::class,
        'proxy.delete' => Api\Requests\ProxyDeleteRequest::class,
        'proxy.get' => Api\Requests\ProxyGetRequest::class,
        'proxy.update' => Api\Requests\ProxyUpdateRequest::class,
        'proxygroup.create' => Api\Requests\ProxygroupCreateRequest::class,
        'proxygroup.delete' => Api\Requests\ProxygroupDeleteRequest::class,
        'proxygroup.get' => Api\Requests\ProxygroupGetRequest::class,
        'proxygroup.update' => Api\Requests\ProxygroupUpdateRequest::class,
        'regexp.create' => Api\Requests\RegexpCreateRequest::class,
        'regexp.delete' => Api\Requests\RegexpDeleteRequest::class,
        'regexp.get' => Api\Requests\RegexpGetRequest::class,
        'regexp.update' => Api\Requests\RegexpUpdateRequest::class,
        'report.create' => Api\Requests\ReportCreateRequest::class,
        'report.delete' => Api\Requests\ReportDeleteRequest::class,
        'report.get' => Api\Requests\ReportGetRequest::class,
        'report.update' => Api\Requests\ReportUpdateRequest::class,
        'role.create' => Api\Requests\RoleCreateRequest::class,
        'role.delete' => Api\Requests\RoleDeleteRequest::class,
        'role.get' => Api\Requests\RoleGetRequest::class,
        'role.update' => Api\Requests\RoleUpdateRequest::class,
        'script.create' => Api\Requests\ScriptCreateRequest::class,
        'script.delete' => Api\Requests\ScriptDeleteRequest::class,
        'script.execute' => Api\Requests\ScriptExecuteRequest::class,
        'script.get' => Api\Requests\ScriptGetRequest::class,
        'script.getscriptsbyevents' => Api\Requests\ScriptGetscriptsbyeventsRequest::class,
        'script.getscriptsbyhosts' => Api\Requests\ScriptGetscriptsbyhostsRequest::class,
        'script.update' => Api\Requests\ScriptUpdateRequest::class,
        'service.create' => Api\Requests\ServiceCreateRequest::class,
        'service.delete' => Api\Requests\ServiceDeleteRequest::class,
        'service.get' => Api\Requests\ServiceGetRequest::class,
        'service.update' => Api\Requests\ServiceUpdateRequest::class,
        'settings.get' => Api\Requests\SettingsGetRequest::class,
        'settings.update' => Api\Requests\SettingsUpdateRequest::class,
        'sla.create' => Api\Requests\SlaCreateRequest::class,
        'sla.delete' => Api\Requests\SlaDeleteRequest::class,
        'sla.get' => Api\Requests\SlaGetRequest::class,
        'sla.getsli' => Api\Requests\SlaGetsliRequest::class,
        'sla.update' => Api\Requests\SlaUpdateRequest::class,
        'task.create' => Api\Requests\TaskCreateRequest::class,
        'task.get' => Api\Requests\TaskGetRequest::class,
        'template.create' => Api\Requests\TemplateCreateRequest::class,
        'template.delete' => Api\Requests\TemplateDeleteRequest::class,
        'template.get' => Api\Requests\TemplateGetRequest::class,
        'template.massadd' => Api\Requests\TemplateMassaddRequest::class,
        'template.massremove' => Api\Requests\TemplateMassremoveRequest::class,
        'template.massupdate' => Api\Requests\TemplateMassupdateRequest::class,
        'template.update' => Api\Requests\TemplateUpdateRequest::class,
        'templatedashboard.create' => Api\Requests\TemplatedashboardCreateRequest::class,
        'templatedashboard.delete' => Api\Requests\TemplatedashboardDeleteRequest::class,
        'templatedashboard.get' => Api\Requests\TemplatedashboardGetRequest::class,
        'templatedashboard.update' => Api\Requests\TemplatedashboardUpdateRequest::class,
        'templategroup.create' => Api\Requests\TemplategroupCreateRequest::class,
        'templategroup.delete' => Api\Requests\TemplategroupDeleteRequest::class,
        'templategroup.get' => Api\Requests\TemplategroupGetRequest::class,
        'templategroup.massadd' => Api\Requests\TemplategroupMassaddRequest::class,
        'templategroup.massremove' => Api\Requests\TemplategroupMassremoveRequest::class,
        'templategroup.massupdate' => Api\Requests\TemplategroupMassupdateRequest::class,
        'templategroup.propagate' => Api\Requests\TemplategroupPropagateRequest::class,
        'templategroup.update' => Api\Requests\TemplategroupUpdateRequest::class,
        'token.create' => Api\Requests\TokenCreateRequest::class,
        'token.delete' => Api\Requests\TokenDeleteRequest::class,
        'token.generate' => Api\Requests\TokenGenerateRequest::class,
        'token.get' => Api\Requests\TokenGetRequest::class,
        'token.update' => Api\Requests\TokenUpdateRequest::class,
        'trend.get' => Api\Requests\TrendGetRequest::class,
        'trigger.create' => Api\Requests\TriggerCreateRequest::class,
        'trigger.delete' => Api\Requests\TriggerDeleteRequest::class,
        'trigger.get' => Api\Requests\TriggerGetRequest::class,
        'trigger.update' => Api\Requests\TriggerUpdateRequest::class,
        'triggerprototype.create' => Api\Requests\TriggerprototypeCreateRequest::class,
        'triggerprototype.delete' => Api\Requests\TriggerprototypeDeleteRequest::class,
        'triggerprototype.get' => Api\Requests\TriggerprototypeGetRequest::class,
        'triggerprototype.update' => Api\Requests\TriggerprototypeUpdateRequest::class,
        'user.checkAuthentication' => Api\Requests\UserCheckAuthenticationRequest::class,
        'user.create' => Api\Requests\UserCreateRequest::class,
        'user.delete' => Api\Requests\UserDeleteRequest::class,
        'user.get' => Api\Requests\UserGetRequest::class,
        'user.login' => Api\Requests\UserLoginRequest::class,
        'user.logout' => Api\Requests\UserLogoutRequest::class,
        'user.provision' => Api\Requests\UserProvisionRequest::class,
        'user.resettotp' => Api\Requests\UserResettotpRequest::class,
        'user.unblock' => Api\Requests\UserUnblockRequest::class,
        'user.update' => Api\Requests\UserUpdateRequest::class,
        'userdirectory.create' => Api\Requests\UserdirectoryCreateRequest::class,
        'userdirectory.delete' => Api\Requests\UserdirectoryDeleteRequest::class,
        'userdirectory.get' => Api\Requests\UserdirectoryGetRequest::class,
        'userdirectory.test' => Api\Requests\UserdirectoryTestRequest::class,
        'userdirectory.update' => Api\Requests\UserdirectoryUpdateRequest::class,
        'usergroup.create' => Api\Requests\UsergroupCreateRequest::class,
        'usergroup.delete' => Api\Requests\UsergroupDeleteRequest::class,
        'usergroup.get' => Api\Requests\UsergroupGetRequest::class,
        'usergroup.update' => Api\Requests\UsergroupUpdateRequest::class,
        'usermacro.create' => Api\Requests\UsermacroCreateRequest::class,
        'usermacro.createglobal' => Api\Requests\UsermacroCreateglobalRequest::class,
        'usermacro.delete' => Api\Requests\UsermacroDeleteRequest::class,
        'usermacro.deleteglobal' => Api\Requests\UsermacroDeleteglobalRequest::class,
        'usermacro.get' => Api\Requests\UsermacroGetRequest::class,
        'usermacro.update' => Api\Requests\UsermacroUpdateRequest::class,
        'usermacro.updateglobal' => Api\Requests\UsermacroUpdateglobalRequest::class,
        'valuemap.create' => Api\Requests\ValuemapCreateRequest::class,
        'valuemap.delete' => Api\Requests\ValuemapDeleteRequest::class,
        'valuemap.get' => Api\Requests\ValuemapGetRequest::class,
        'valuemap.update' => Api\Requests\ValuemapUpdateRequest::class,
    ];

    /** @var array<string, class-string<AbstractRequest>> */
    private array $requestClasses = self::REQUEST_CLASSES;

    public function methods(): array
    {
        return array_keys($this->requestClasses);
    }

    /**
     * @return array<string, class-string<AbstractRequest>>
     */
    public function requestClasses(): array
    {
        return $this->requestClasses;
    }

    /**
     * @param class-string<AbstractRequest> $requestClass
     */
    public function register(string $requestClass): void
    {
        if (!is_a($requestClass, AbstractRequest::class, true)) {
            throw new InvalidArgumentException(sprintf(
                'Request class %s must extend %s.',
                $requestClass,
                AbstractRequest::class,
            ));
        }

        $request = $requestClass::fromParams([]);
        $this->requestClasses[$request->method()] = $requestClass;
    }

    public function has(Request $request): bool
    {
        return array_key_exists($request->method(), $this->requestClasses);
    }

    /** @return class-string<Request> */
    public function requestClassFor(Request $request): string
    {
        return $this->requestClasses[$request->method()] ?? throw UnknownZabbixMethod::method($request->method());
    }
}
