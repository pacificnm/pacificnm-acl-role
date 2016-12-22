<?php
namespace AclRole\Mapper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclRole\Mapper\MysqlMapper;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use AclRole\Hydrator\Hydrator;
use AclRole\Entity\Entity;

class MysqlMapperFactory
{

    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \AclRole\Mapper\MysqlMapper
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new AggregateHydrator();
        
        $hydrator->add(new Hydrator());
        
        $prototype = new Entity();
        
        $readAdapter = $serviceLocator->get('db1');
        
        $writeAdapter = $serviceLocator->get('db2');
        
        return new MysqlMapper($readAdapter, $writeAdapter, $hydrator, $prototype);
    }
}

