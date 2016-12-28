<?php
namespace AclRole\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclRole\Controller\UpdateController;

class UpdateControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \AclRole\Controller\UpdateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
         
        $service = $realServiceLocator->get('AclRole\Service\ServiceInterface');
    
        $form = $realServiceLocator->get('AclRole\Form\Form');
        
        return new UpdateController($service, $form);
    }
}

