<?php
namespace AclRole\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclRole\Controller\RestController;

class RestControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \AclRole\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
         
        $service = $realServiceLocator->get('AclRole\Service\ServiceInterface');
    
        $form = $realServiceLocator->get('AclRole\Form\Form');
        
        return new RestController($service, $form);
    }
}

