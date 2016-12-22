<?php
namespace AclRole\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclRole\Service\Service;

class ServiceFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \AclRole\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('AclRole\Mapper\MysqlMapperInterface');
        
        return new Service($mapper);
    }
}