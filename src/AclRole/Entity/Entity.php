<?php
namespace AclRole\Entity;

class Entity
{

    /**
     *
     * @var number
     */
    protected $aclRoleId;

    /**
     *
     * @var string
     */
    protected $aclRoleName;

    /**
     *
     * @return the $aclRoleId
     */
    public function getAclRoleId()
    {
        return $this->aclRoleId;
    }

    /**
     *
     * @return the $aclRoleName
     */
    public function getAclRoleName()
    {
        return $this->aclRoleName;
    }

    /**
     *
     * @param number $aclRoleId            
     */
    public function setAclRoleId($aclRoleId)
    {
        $this->aclRoleId = $aclRoleId;
    }

    /**
     *
     * @param string $aclRoleName            
     */
    public function setAclRoleName($aclRoleName)
    {
        $this->aclRoleName = $aclRoleName;
    }
}