<?php

/** @noinspection PhpUnused */

declare(strict_types=1);

namespace App\Zabbix;

use Idiot\Zabbix\ZabbixApi;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Psr\Log\LoggerInterface;

final class ZabbixPhpProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            abstract: ZabbixApi::class,
            concrete: static function (Application $app): ZabbixApi {
                $config = $app['config'];

                return new ZabbixApi(
                    options: [
                        'url' => (string)$config->get('idiot-zabbix.server'),
                        'token' => $config->get('idiot-zabbix.token'),
                        'username' => $config->get('idiot-zabbix.username'),
                        'password' => $config->get('idiot-zabbix.password'),
                        'verify' => (bool)$config->get('idiot-zabbix.verify', true),
                    ],
                    logger: $app->make(LoggerInterface::class),
                );
            },
        );
    }
}
