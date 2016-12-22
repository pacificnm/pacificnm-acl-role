<?php
namespace AclRole\Service;

use AclRole\Mapper\MysqlMapperInterface;
use AclRole\Entity\Entity;

class Service implements ServiceInterface
{

    /**
     *
     * @var MysqlMapperInterface
     */
    protected $mapper;

    /**
     *
     * @param MysqlMapperInterface $mapper            
     */
    public function __construct(MysqlMapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclRole\Service\ServiceInterface::getAll()
     */
    public function getAll($filter)
    {
        return $this->mapper->getAll($filter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclRole\Service\ServiceInterface::get()
     */
    public function get($id)
    {
        return $this->mapper->get($id);
    }

    /**
     * 
     * {@inheritDoc}
     * @see \AclRole\Service\ServiceInterface::getRoleByName()
     */
    public function getRoleByName($aclRoleName)
    {
        return $this->mapper->getRoleByName($aclRoleName);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclRole\Service\ServiceInterface::save()
     */
    public function save(Entity $entity)
    {
        return $this->mapper->save($entity);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclRole\Service\ServiceInterface::delete()
     */
    public function delete(Entity $entity)
    {
        return $this->mapper->delete($entity);
    }
}