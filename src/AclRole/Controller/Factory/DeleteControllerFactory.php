<?php
namespace AclRole\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclRole\Controller\DeleteController;

class DeleteControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \AclRole\Controller\DeleteController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
         
        $service = $realServiceLocator->get('AclRole\Service\ServiceInterface');
    
        return new DeleteController($service);
    }
}

