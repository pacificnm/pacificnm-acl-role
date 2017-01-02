<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-acl-role for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-acl-role/blob/master/LICENSE.md
 */
namespace Pacificnm\AclRole;

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
        return include __DIR__ . '/../config/pacificnm.acl-role.global.php';
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
