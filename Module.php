<?php
namespace AclRole;

class Module
{
    public function getConsoleUsage()
    {
        return array(
            'acl-role --list' => 'lists all Acl Roles',
            'acl-role --view [--id=]' => 'gets a single Acl Role by its id'
        );
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }
}
