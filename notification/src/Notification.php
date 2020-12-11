<?php
namespace Notification;
class Notification
{

    // this Class Build object from one of the Notification Providers
    public function __call($method, $arguments)
    {
     //Catch Class Name
    $providerPath = __NAMESPACE__ . '\NotifProvider\\' .  substr($method, 4) . 'Provider';
     //make Object
     $providerInstance = new $providerPath(...$arguments);
     //Return Send Method
     return $providerInstance->send();
    }
}