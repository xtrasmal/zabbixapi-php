<?php
require_once("../src/ZabbixApi.php");

use IntelliTrend\Zabbix\ZabbixApi;
use IntelliTrend\Zabbix\ZabbixApiException;

print "Zabbix API Example\n";
print " Connect to API and get some hostdata as list\n";
print " Disable TLS certificate verification\n";
print "=====================================================\n";

$zabUrl ='https://my.zabbixurl.com/zabbix';
$zabToken = '123456789abcdef123456789abcdef123456789abcdef123456789abcdef1234';

try {
	// disable TLS certificate verification
	$options = array('verify' => false);
	$zbx = new ZabbixApi($options);
	print "ZabbixApi library version:". $zbx->getVersion(). "\n";
	$zbx->login($zabUrl, $zabToken);

	//this is similar to: $result = $zbx->call('apiinfo.version');
	$result = $zbx->getApiVersion();
	print "Remote Zabbix API Version:$result\n";
	
	// Get host count
	$params = array(		
		// count of hosts - no ids, no details
		"countOutput" => true  
	);
	$result = $zbx->call('host.get',$params);
	print "Number of Hosts:$result\n";

	$limit = 5;
	$params = array(
		 // limit host info to these fields, to get all use "extend" instead of field list
		"output" => array("hostid", "host", "name", "status"),
		// limit number of hosts returned, otherwise get all hosts you have access to
		"limit" => $limit  
	);
	$result = $zbx->call('host.get',$params);


	print "Getting hostlist - limited to:$limit\n";
	foreach ($result as $v) {
		$hostid = $v['hostid'];
		$hostname = $v['host'];
		$name = $v['name'];
		$status = $v['status'];
		print "hostid:$hostid, status:$status, hostname:$hostname, alias:$name\n";
	}

} catch (ZabbixApiException $e) {
	print "==== Zabbix API Exception ===\n";
	print 'Errorcode: '.$e->getCode()."\n";
	print 'ErrorMessage: '.$e->getMessage()."\n";
	exit;
} catch (Exception $e) {
	print "==== Exception ===\n";
	print 'Errorcode: '.$e->getCode()."\n";
	print 'ErrorMessage: '.$e->getMessage()."\n";
	exit;
}
