<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-acl-role for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-acl-role/blob/master/LICENSE.md
 */
namespace Pacificnm\AclRole\View\Helper;

use Zend\View\Helper\AbstractHelper;

class AclRoleSearchForm  extends AbstractHelper
{
    public function __construct()
    {
    
    }
    
    /**
     *
     * @param array $queryParams
     */
    public function __invoke(array $queryParams = array())
    {
        $view = $this->getView();
    
        $partialHelper = $view->plugin('partial');
    
        $data = new \stdClass();
    
        $data->queryParams = $queryParams;
    
        return $partialHelper('partials/acl-role-search-form.phtml', $data);
    }
}

