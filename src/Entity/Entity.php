<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-acl-role for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-acl-role/blob/master/LICENSE.md
 */
namespace Pacificnm\AclRole\Entity;

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