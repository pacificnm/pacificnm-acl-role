<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-acl-role for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-acl-role/blob/master/LICENSE.md
 */
namespace Pacificnm\AclRole\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\AclRole\Controller\RestController;

class RestControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\AclRole\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
         
        $service = $realServiceLocator->get('Pacificnm\AclRole\Service\ServiceInterface');
    
        $form = $realServiceLocator->get('Pacificnm\AclRole\Form\Form');
        
        return new RestController($service, $form);
    }
}

