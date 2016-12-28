<?php
namespace AclRole\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclRole\Controller\ConsoleController;

class ConsoleControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \AclRole\Controller\ConsoleController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $console = $realServiceLocator->get('console');
        
        $service = $realServiceLocator->get('AclRole\Service\ServiceInterface');
        
        return new ConsoleController($console, $service);
    }
}


