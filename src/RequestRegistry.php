<?php

declare(strict_types=1);

namespace Idiot\Zabbix;

use Idiot\Zabbix\Requests\AbstractZabbixRequest;
use Idiot\Zabbix\Requests\ZabbixRequest;
use InvalidArgumentException;

/**
 * Registry of generated Zabbix request classes.
 */
final class RequestRegistry
{
    /** @var array<string, class-string<AbstractZabbixRequest>> */
    private const REQUEST_CLASSES = [
        'action.create' => Requests\ActionCreateRequest::class,
        'action.delete' => Requests\ActionDeleteRequest::class,
        'action.get' => Requests\ActionGetRequest::class,
        'action.update' => Requests\ActionUpdateRequest::class,
        'alert.get' => Requests\AlertGetRequest::class,
        'apiinfo.version' => Requests\ApiinfoVersionRequest::class,
        'auditlog.get' => Requests\AuditlogGetRequest::class,
        'authentication.get' => Requests\AuthenticationGetRequest::class,
        'authentication.update' => Requests\AuthenticationUpdateRequest::class,
        'autoregistration.get' => Requests\AutoregistrationGetRequest::class,
        'autoregistration.update' => Requests\AutoregistrationUpdateRequest::class,
        'connector.create' => Requests\ConnectorCreateRequest::class,
        'connector.delete' => Requests\ConnectorDeleteRequest::class,
        'connector.get' => Requests\ConnectorGetRequest::class,
        'connector.update' => Requests\ConnectorUpdateRequest::class,
        'correlation.create' => Requests\CorrelationCreateRequest::class,
        'correlation.delete' => Requests\CorrelationDeleteRequest::class,
        'correlation.get' => Requests\CorrelationGetRequest::class,
        'correlation.update' => Requests\CorrelationUpdateRequest::class,
        'dashboard.create' => Requests\DashboardCreateRequest::class,
        'dashboard.delete' => Requests\DashboardDeleteRequest::class,
        'dashboard.get' => Requests\DashboardGetRequest::class,
        'dashboard.update' => Requests\DashboardUpdateRequest::class,
        'dcheck.get' => Requests\DcheckGetRequest::class,
        'dhost.get' => Requests\DhostGetRequest::class,
        'discoveryrule.copy' => Requests\DiscoveryruleCopyRequest::class,
        'discoveryrule.create' => Requests\DiscoveryruleCreateRequest::class,
        'discoveryrule.delete' => Requests\DiscoveryruleDeleteRequest::class,
        'discoveryrule.get' => Requests\DiscoveryruleGetRequest::class,
        'discoveryrule.update' => Requests\DiscoveryruleUpdateRequest::class,
        'drule.create' => Requests\DruleCreateRequest::class,
        'drule.delete' => Requests\DruleDeleteRequest::class,
        'drule.get' => Requests\DruleGetRequest::class,
        'drule.update' => Requests\DruleUpdateRequest::class,
        'dservice.get' => Requests\DserviceGetRequest::class,
        'event.acknowledge' => Requests\EventAcknowledgeRequest::class,
        'event.get' => Requests\EventGetRequest::class,
        'graph.create' => Requests\GraphCreateRequest::class,
        'graph.delete' => Requests\GraphDeleteRequest::class,
        'graph.get' => Requests\GraphGetRequest::class,
        'graph.update' => Requests\GraphUpdateRequest::class,
        'graphitem.get' => Requests\GraphitemGetRequest::class,
        'graphprototype.create' => Requests\GraphprototypeCreateRequest::class,
        'graphprototype.delete' => Requests\GraphprototypeDeleteRequest::class,
        'graphprototype.get' => Requests\GraphprototypeGetRequest::class,
        'graphprototype.update' => Requests\GraphprototypeUpdateRequest::class,
        'hanode.get' => Requests\HanodeGetRequest::class,
        'history.clear' => Requests\HistoryClearRequest::class,
        'history.get' => Requests\HistoryGetRequest::class,
        'history.push' => Requests\HistoryPushRequest::class,
        'host.create' => Requests\HostCreateRequest::class,
        'host.delete' => Requests\HostDeleteRequest::class,
        'host.get' => Requests\HostGetRequest::class,
        'host.massadd' => Requests\HostMassaddRequest::class,
        'host.massremove' => Requests\HostMassremoveRequest::class,
        'host.massupdate' => Requests\HostMassupdateRequest::class,
        'host.update' => Requests\HostUpdateRequest::class,
        'hostgroup.create' => Requests\HostgroupCreateRequest::class,
        'hostgroup.delete' => Requests\HostgroupDeleteRequest::class,
        'hostgroup.get' => Requests\HostgroupGetRequest::class,
        'hostgroup.massadd' => Requests\HostgroupMassaddRequest::class,
        'hostgroup.massremove' => Requests\HostgroupMassremoveRequest::class,
        'hostgroup.massupdate' => Requests\HostgroupMassupdateRequest::class,
        'hostgroup.propagate' => Requests\HostgroupPropagateRequest::class,
        'hostgroup.update' => Requests\HostgroupUpdateRequest::class,
        'hostinterface.create' => Requests\HostinterfaceCreateRequest::class,
        'hostinterface.delete' => Requests\HostinterfaceDeleteRequest::class,
        'hostinterface.get' => Requests\HostinterfaceGetRequest::class,
        'hostinterface.massadd' => Requests\HostinterfaceMassaddRequest::class,
        'hostinterface.massremove' => Requests\HostinterfaceMassremoveRequest::class,
        'hostinterface.replacehostinterfaces' => Requests\HostinterfaceReplacehostinterfacesRequest::class,
        'hostinterface.update' => Requests\HostinterfaceUpdateRequest::class,
        'hostprototype.create' => Requests\HostprototypeCreateRequest::class,
        'hostprototype.delete' => Requests\HostprototypeDeleteRequest::class,
        'hostprototype.get' => Requests\HostprototypeGetRequest::class,
        'hostprototype.update' => Requests\HostprototypeUpdateRequest::class,
        'housekeeping.get' => Requests\HousekeepingGetRequest::class,
        'housekeeping.update' => Requests\HousekeepingUpdateRequest::class,
        'httptest.create' => Requests\HttptestCreateRequest::class,
        'httptest.delete' => Requests\HttptestDeleteRequest::class,
        'httptest.get' => Requests\HttptestGetRequest::class,
        'httptest.update' => Requests\HttptestUpdateRequest::class,
        'iconmap.create' => Requests\IconmapCreateRequest::class,
        'iconmap.delete' => Requests\IconmapDeleteRequest::class,
        'iconmap.get' => Requests\IconmapGetRequest::class,
        'iconmap.update' => Requests\IconmapUpdateRequest::class,
        'image.create' => Requests\ImageCreateRequest::class,
        'image.delete' => Requests\ImageDeleteRequest::class,
        'image.get' => Requests\ImageGetRequest::class,
        'image.update' => Requests\ImageUpdateRequest::class,
        'item.create' => Requests\ItemCreateRequest::class,
        'item.delete' => Requests\ItemDeleteRequest::class,
        'item.get' => Requests\ItemGetRequest::class,
        'item.update' => Requests\ItemUpdateRequest::class,
        'itemprototype.create' => Requests\ItemprototypeCreateRequest::class,
        'itemprototype.delete' => Requests\ItemprototypeDeleteRequest::class,
        'itemprototype.get' => Requests\ItemprototypeGetRequest::class,
        'itemprototype.update' => Requests\ItemprototypeUpdateRequest::class,
        'maintenance.create' => Requests\MaintenanceCreateRequest::class,
        'maintenance.delete' => Requests\MaintenanceDeleteRequest::class,
        'maintenance.get' => Requests\MaintenanceGetRequest::class,
        'maintenance.update' => Requests\MaintenanceUpdateRequest::class,
        'map.create' => Requests\MapCreateRequest::class,
        'map.delete' => Requests\MapDeleteRequest::class,
        'map.get' => Requests\MapGetRequest::class,
        'map.update' => Requests\MapUpdateRequest::class,
        'mediatype.create' => Requests\MediatypeCreateRequest::class,
        'mediatype.delete' => Requests\MediatypeDeleteRequest::class,
        'mediatype.get' => Requests\MediatypeGetRequest::class,
        'mediatype.update' => Requests\MediatypeUpdateRequest::class,
        'mfa.create' => Requests\MfaCreateRequest::class,
        'mfa.delete' => Requests\MfaDeleteRequest::class,
        'mfa.get' => Requests\MfaGetRequest::class,
        'mfa.update' => Requests\MfaUpdateRequest::class,
        'module.create' => Requests\ModuleCreateRequest::class,
        'module.delete' => Requests\ModuleDeleteRequest::class,
        'module.get' => Requests\ModuleGetRequest::class,
        'module.update' => Requests\ModuleUpdateRequest::class,
        'problem.get' => Requests\ProblemGetRequest::class,
        'proxy.create' => Requests\ProxyCreateRequest::class,
        'proxy.delete' => Requests\ProxyDeleteRequest::class,
        'proxy.get' => Requests\ProxyGetRequest::class,
        'proxy.update' => Requests\ProxyUpdateRequest::class,
        'proxygroup.create' => Requests\ProxygroupCreateRequest::class,
        'proxygroup.delete' => Requests\ProxygroupDeleteRequest::class,
        'proxygroup.get' => Requests\ProxygroupGetRequest::class,
        'proxygroup.update' => Requests\ProxygroupUpdateRequest::class,
        'regexp.create' => Requests\RegexpCreateRequest::class,
        'regexp.delete' => Requests\RegexpDeleteRequest::class,
        'regexp.get' => Requests\RegexpGetRequest::class,
        'regexp.update' => Requests\RegexpUpdateRequest::class,
        'report.create' => Requests\ReportCreateRequest::class,
        'report.delete' => Requests\ReportDeleteRequest::class,
        'report.get' => Requests\ReportGetRequest::class,
        'report.update' => Requests\ReportUpdateRequest::class,
        'role.create' => Requests\RoleCreateRequest::class,
        'role.delete' => Requests\RoleDeleteRequest::class,
        'role.get' => Requests\RoleGetRequest::class,
        'role.update' => Requests\RoleUpdateRequest::class,
        'script.create' => Requests\ScriptCreateRequest::class,
        'script.delete' => Requests\ScriptDeleteRequest::class,
        'script.execute' => Requests\ScriptExecuteRequest::class,
        'script.get' => Requests\ScriptGetRequest::class,
        'script.getscriptsbyevents' => Requests\ScriptGetscriptsbyeventsRequest::class,
        'script.getscriptsbyhosts' => Requests\ScriptGetscriptsbyhostsRequest::class,
        'script.update' => Requests\ScriptUpdateRequest::class,
        'service.create' => Requests\ServiceCreateRequest::class,
        'service.delete' => Requests\ServiceDeleteRequest::class,
        'service.get' => Requests\ServiceGetRequest::class,
        'service.update' => Requests\ServiceUpdateRequest::class,
        'settings.get' => Requests\SettingsGetRequest::class,
        'settings.update' => Requests\SettingsUpdateRequest::class,
        'sla.create' => Requests\SlaCreateRequest::class,
        'sla.delete' => Requests\SlaDeleteRequest::class,
        'sla.get' => Requests\SlaGetRequest::class,
        'sla.getsli' => Requests\SlaGetsliRequest::class,
        'sla.update' => Requests\SlaUpdateRequest::class,
        'task.create' => Requests\TaskCreateRequest::class,
        'task.get' => Requests\TaskGetRequest::class,
        'template.create' => Requests\TemplateCreateRequest::class,
        'template.delete' => Requests\TemplateDeleteRequest::class,
        'template.get' => Requests\TemplateGetRequest::class,
        'template.massadd' => Requests\TemplateMassaddRequest::class,
        'template.massremove' => Requests\TemplateMassremoveRequest::class,
        'template.massupdate' => Requests\TemplateMassupdateRequest::class,
        'template.update' => Requests\TemplateUpdateRequest::class,
        'templatedashboard.create' => Requests\TemplatedashboardCreateRequest::class,
        'templatedashboard.delete' => Requests\TemplatedashboardDeleteRequest::class,
        'templatedashboard.get' => Requests\TemplatedashboardGetRequest::class,
        'templatedashboard.update' => Requests\TemplatedashboardUpdateRequest::class,
        'templategroup.create' => Requests\TemplategroupCreateRequest::class,
        'templategroup.delete' => Requests\TemplategroupDeleteRequest::class,
        'templategroup.get' => Requests\TemplategroupGetRequest::class,
        'templategroup.massadd' => Requests\TemplategroupMassaddRequest::class,
        'templategroup.massremove' => Requests\TemplategroupMassremoveRequest::class,
        'templategroup.massupdate' => Requests\TemplategroupMassupdateRequest::class,
        'templategroup.propagate' => Requests\TemplategroupPropagateRequest::class,
        'templategroup.update' => Requests\TemplategroupUpdateRequest::class,
        'token.create' => Requests\TokenCreateRequest::class,
        'token.delete' => Requests\TokenDeleteRequest::class,
        'token.generate' => Requests\TokenGenerateRequest::class,
        'token.get' => Requests\TokenGetRequest::class,
        'token.update' => Requests\TokenUpdateRequest::class,
        'trend.get' => Requests\TrendGetRequest::class,
        'trigger.create' => Requests\TriggerCreateRequest::class,
        'trigger.delete' => Requests\TriggerDeleteRequest::class,
        'trigger.get' => Requests\TriggerGetRequest::class,
        'trigger.update' => Requests\TriggerUpdateRequest::class,
        'triggerprototype.create' => Requests\TriggerprototypeCreateRequest::class,
        'triggerprototype.delete' => Requests\TriggerprototypeDeleteRequest::class,
        'triggerprototype.get' => Requests\TriggerprototypeGetRequest::class,
        'triggerprototype.update' => Requests\TriggerprototypeUpdateRequest::class,
        'user.checkAuthentication' => Requests\UserCheckAuthenticationRequest::class,
        'user.create' => Requests\UserCreateRequest::class,
        'user.delete' => Requests\UserDeleteRequest::class,
        'user.get' => Requests\UserGetRequest::class,
        'user.login' => Requests\UserLoginRequest::class,
        'user.logout' => Requests\UserLogoutRequest::class,
        'user.provision' => Requests\UserProvisionRequest::class,
        'user.resettotp' => Requests\UserResettotpRequest::class,
        'user.unblock' => Requests\UserUnblockRequest::class,
        'user.update' => Requests\UserUpdateRequest::class,
        'userdirectory.create' => Requests\UserdirectoryCreateRequest::class,
        'userdirectory.delete' => Requests\UserdirectoryDeleteRequest::class,
        'userdirectory.get' => Requests\UserdirectoryGetRequest::class,
        'userdirectory.test' => Requests\UserdirectoryTestRequest::class,
        'userdirectory.update' => Requests\UserdirectoryUpdateRequest::class,
        'usergroup.create' => Requests\UsergroupCreateRequest::class,
        'usergroup.delete' => Requests\UsergroupDeleteRequest::class,
        'usergroup.get' => Requests\UsergroupGetRequest::class,
        'usergroup.update' => Requests\UsergroupUpdateRequest::class,
        'usermacro.create' => Requests\UsermacroCreateRequest::class,
        'usermacro.createglobal' => Requests\UsermacroCreateglobalRequest::class,
        'usermacro.delete' => Requests\UsermacroDeleteRequest::class,
        'usermacro.deleteglobal' => Requests\UsermacroDeleteglobalRequest::class,
        'usermacro.get' => Requests\UsermacroGetRequest::class,
        'usermacro.update' => Requests\UsermacroUpdateRequest::class,
        'usermacro.updateglobal' => Requests\UsermacroUpdateglobalRequest::class,
        'valuemap.create' => Requests\ValuemapCreateRequest::class,
        'valuemap.delete' => Requests\ValuemapDeleteRequest::class,
        'valuemap.get' => Requests\ValuemapGetRequest::class,
        'valuemap.update' => Requests\ValuemapUpdateRequest::class,
    ];

    /** @var array<string, class-string<AbstractZabbixRequest>> */
    private array $requestClasses = self::REQUEST_CLASSES;

    public function methods(): array
    {
        return array_keys($this->requestClasses);
    }

    /**
     * @return array<string, class-string<AbstractZabbixRequest>>
     */
    public function requestClasses(): array
    {
        return $this->requestClasses;
    }

    /**
     * @param class-string<AbstractZabbixRequest> $requestClass
     */
    public function register(string $requestClass): void
    {
        if (!is_a($requestClass, AbstractZabbixRequest::class, true)) {
            throw new InvalidArgumentException(sprintf(
                'Request class %s must extend %s.',
                $requestClass,
                AbstractZabbixRequest::class,
            ));
        }

        $request = $requestClass::fromParams([]);
        $this->requestClasses[$request->method()] = $requestClass;
    }

    public function has(ZabbixRequest $request): bool
    {
        return array_key_exists($request->method(), $this->requestClasses);
    }

    /** @return class-string<ZabbixRequest> */
    public function requestClassFor(ZabbixRequest $request): string
    {
        return $this->requestClasses[$request->method()] ?? throw UnknownZabbixMethod::method($request->method());
    }
}
