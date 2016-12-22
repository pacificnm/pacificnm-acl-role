<?php
namespace AclRole\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclRole\Controller\CreateController;

class CreateControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \AclRole\Controller\CreateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
         
        $service = $realServiceLocator->get('AclRole\Service\ServiceInterface');
    
        $form = $realServiceLocator->get('AclRole\Form\Form');
        
        return new CreateController($service, $form);
    }
}

