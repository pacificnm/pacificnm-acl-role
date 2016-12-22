<?php
namespace AclRole\Service;

use AclRole\Entity\Entity;
use Zend\Paginator\Paginator;

interface ServiceInterface
{

    /**
     *
     * @param array $filter            
     * @return Paginator
     */
    public function getAll($filter);

    /**
     *
     * @param number $id            
     * @return Entity
     */
    public function get($id);

    /**
     * 
     * @param string $aclRoleName
     * @return Entity
     */
    public function getRoleByName($aclRoleName);

    /**
     *
     * @param Entity $entity            
     * @return Entity
     */
    public function save(Entity $entity);

    /**
     *
     * @param Entity $entity            
     * @return boolean
     */
    public function delete(Entity $entity);
}