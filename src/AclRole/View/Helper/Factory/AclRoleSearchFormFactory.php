<?php
namespace AclRole\View\Helper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclRole\View\Helper\AclRoleSearchForm;

class AclRoleSearchFormFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \AclRole\View\Helper\AclRoleSearchForm
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new AclRoleSearchForm();
    }
}

