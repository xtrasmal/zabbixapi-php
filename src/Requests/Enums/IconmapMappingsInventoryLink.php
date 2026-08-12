<?php declare(strict_types=1);

namespace Idiot\Zabbix\Requests\Enums;

/**
 * ID of the host inventory field to match the expression against. Property behavior: required. Refer to the host inventory object (host.object) for the full list of supported inventory fields. Possible values: 1 - type; 2 - type_full; 3 - name; 4 - alias; 5 - os; 6 - os_full; 7 - os_short; 8 - serialno_a; 9 - serialno_b; 10 - tag; 11 - asset_tag; 12 - macaddress_a; 13 - macaddress_b; 14 - hardware; 15 - hardware_full; 16 - software; 17 - software_full; 18 - software_app_a; 19 - software_app_b; 20 - software_app_c; 21 - software_app_d; 22 - software_app_e; 23 - contact; 24 - location; 25 - location_lat; 26 - location_lon; 27 - notes; 28 - chassis; 29 - model; 30 - hw_arch; 31 - vendor; 32 - contract_number; 33 - installer_name; 34 - deployment_status; 35 - url_a; 36 - url_b; 37 - url_c; 38 - host_networks; 39 - host_netmask; 40 - host_router; 41 - oob_ip; 42 - oob_netmask; 43 - oob_router; 44 - date_hw_purchase; 45 - date_hw_install; 46 - date_hw_expiry; 47 - date_hw_decomm; 48 - site_address_a; 49 - site_address_b; 50 - site_address_c; 51 - site_city; 52 - site_state; 53 - site_country; 54 - site_zip; 55 - site_rack; 56 - site_notes; 57 - poc_1_name; 58 - poc_1_email; 59 - poc_1_phone_a; 60 - poc_1_phone_b; 61 - poc_1_cell; 62 - poc_1_screen; 63 - poc_1_notes; 64 - poc_2_name; 65 - poc_2_email; 66 - poc_2_phone_a; 67 - poc_2_phone_b; 68 - poc_2_cell; 69 - poc_2_screen; 70 - poc_2_notes.
 */
enum IconmapMappingsInventoryLink: int
{
    case Type = 1;
    case TypeFull = 2;
    case Name = 3;
    case Alias = 4;
    case Os = 5;
    case OsFull = 6;
    case OsShort = 7;
    case SerialnoA = 8;
    case SerialnoB = 9;
    case Tag = 10;
    case AssetTag = 11;
    case MacaddressA = 12;
    case MacaddressB = 13;
    case Hardware = 14;
    case HardwareFull = 15;
    case Software = 16;
    case SoftwareFull = 17;
    case SoftwareAppA = 18;
    case SoftwareAppB = 19;
    case SoftwareAppC = 20;
    case SoftwareAppD = 21;
    case SoftwareAppE = 22;
    case Contact = 23;
    case Location = 24;
    case LocationLat = 25;
    case LocationLon = 26;
    case Notes = 27;
    case Chassis = 28;
    case Model = 29;
    case HwArch = 30;
    case Vendor = 31;
    case ContractNumber = 32;
    case InstallerName = 33;
    case DeploymentStatus = 34;
    case UrlA = 35;
    case UrlB = 36;
    case UrlC = 37;
    case HostNetworks = 38;
    case HostNetmask = 39;
    case HostRouter = 40;
    case OobIp = 41;
    case OobNetmask = 42;
    case OobRouter = 43;
    case DateHwPurchase = 44;
    case DateHwInstall = 45;
    case DateHwExpiry = 46;
    case DateHwDecomm = 47;
    case SiteAddressA = 48;
    case SiteAddressB = 49;
    case SiteAddressC = 50;
    case SiteCity = 51;
    case SiteState = 52;
    case SiteCountry = 53;
    case SiteZip = 54;
    case SiteRack = 55;
    case SiteNotes = 56;
    case Poc1Name = 57;
    case Poc1Email = 58;
    case Poc1PhoneA = 59;
    case Poc1PhoneB = 60;
    case Poc1Cell = 61;
    case Poc1Screen = 62;
    case Poc1Notes = 63;
    case Poc2Name = 64;
    case Poc2Email = 65;
    case Poc2PhoneA = 66;
    case Poc2PhoneB = 67;
    case Poc2Cell = 68;
    case Poc2Screen = 69;
    case Poc2Notes = 70;
}
