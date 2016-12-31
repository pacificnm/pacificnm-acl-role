<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-acl-role for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-acl-role/blob/master/LICENSE.md
 */
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

