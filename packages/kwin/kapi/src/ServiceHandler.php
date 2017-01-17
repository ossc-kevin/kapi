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

    public static function handleRequest($version, $service, $action = null, $param = null)
    {
        self::isServiceValid($service);
        switch (strtolower($service)){
            case 'user':
                $user = new User();
                return $user->userAction($action, $param);
            break;
                
        }
        
	
        
    }
    
    public static function isServiceValid($service){
        if(!empty($service) && in_array($service,config('kapi.services')))
                return true;
        throw new \Exception('INVALID_REQUEST');
        
        
    }
}