<?php

namespace Kwin\Kapi;

/**
 * Class ServiceHandler
 *
 * @package Kwin\Kapi
 */
use Kwin\Kapi\User;
class ServiceHandler
{

    public static function getService($name)
    {
        $name = strtolower(trim($name));
        $serviceInfo = Service::getCachedByName($name);
        $serviceClass = ArrayUtils::get($serviceInfo, 'class_name');

        return new $serviceClass($serviceInfo);
    }

    public static function handleRequest($version, $service, $action = null, $param = null, $payload = null, $format = null, $header = [])
    {
	
	echo $version.'---'.$service.'---'.$action.'---'.$param;
	$user = new User();
	$user->$action($param);
	dd('kevin patel');
        
    }
}