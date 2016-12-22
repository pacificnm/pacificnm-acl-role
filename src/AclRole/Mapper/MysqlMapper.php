<?php
namespace AclRole\Mapper;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use AclRole\Entity\Entity;
use Application\Mapper\AbstractMysqlMapper;
use Zend\Hydrator\HydratorInterface;

class MysqlMapper extends AbstractMysqlMapper implements MysqlMapperInterface
{

    /**
     *
     * @param AdapterInterface $readAdapter            
     * @param AdapterInterface $writeAdapter            
     * @param HydratorInterface $hydrator            
     * @param Entity $prototype            
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
        
        $this->prototype = $prototype;
        
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclRole\Mapper\MysqlMapperInterface::getAll()
     */
    public function getAll($filter)
    {
        $this->select = $this->readSql->select('acl_role');
        
        $this->filter($filter);
        
        // if pagination is disabled
        if(array_key_exists('pagination', $filter)) {
            if($filter['pagination'] == 'off') {
                return $this->getRows();
            }
        }
        
        return $this->getPaginator();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclRole\Mapper\MysqlMapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('acl_role');
        
        $this->select->where(array(
            'acl_role.acl_role_id = ?' => $id
        ));
        
        return $this->getRow();
    }
    
    public function getRoleByName($aclRoleName)
    {
        $this->select = $this->readSql->select('acl_role');
        
        $this->select->where(array(
            'acl_role.acl_role_name = ?' => $aclRoleName
        ));
        
        return $this->getRow();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclRole\Mapper\MysqlMapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
        
        // if we have id then its an update
        if ($entity->getAclRoleId()) {
            $this->update = new Update('acl_role');
            
            $this->update->set($postData);
            
            $this->update->where(array(
                'acl_role.acl_role_id = ?' => $entity->getAclRoleId()
            ));
            
            $this->updateRow();
        } else {
            $this->insert = new Insert('acl_role');
            
            $this->insert->values($postData);
            
            $id = $this->createRow();
            
            $entity->setAclRoleId($id);
        }
        
        return $this->get($entity->getAclRoleId());
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \AclRole\Mapper\MysqlMapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('acl_role');
        
        $this->delete->where(array(
            'acl_role.acl_role_id = ?' => $entity->getAclRoleId()
        ));
        
        return $this->deleteRow();
    }

    /**
     *
     * @param array $filter            
     * @return \AclRole\Mapper\MysqlMapper
     */
    protected function filter($filter)
    {
        if(array_key_exists('aclRoleName', $filter) && ! is_null($filter['aclRoleName'])) {
            $this->select->where->like('acl_role.acl_role_name', $filter['aclRoleName'] . '%');
        }
        
        return $this;
    }
}