<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-acl-role for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-acl-role/blob/master/LICENSE.md
 */
namespace Pacificnm\AclRole\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\AclRole\Form\Form;
use Pacificnm\AclRole\Service\ServiceInterface;

class CreateController extends AbstractApplicationController
{
    /**
     *
     * @var ServiceInterface
     */
    protected $service;
    
    /**
     * 
     * @var Form
     */
    protected $form;
    
    /**
     * 
     * @param ServiceInterface $service
     * @param Form $form
     */
    public function __construct(ServiceInterface $service, Form $form)
    {
        $this->service = $service;
        
        $this->form = $form;
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Application\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();
    
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $postData = $request->getPost();
            
            $this->form->setData($postData);
            
            if ($this->form->isValid()) {
                $entity = $this->form->getData();
                
                $aclRoleEntity = $this->service->save($entity);
                
                $this->getEventManager()->trigger('aclRoleCreate', $this, array(
                    'authId' => $this->identity()->getAuthId(),
                    'requestUrl' => $this->getRequest()->getUri(),
                    'aclRoleEntity' => $aclRoleEntity
                ));
                
                $this->flashMessenger()->addSuccessMessage('Object was saved');
                
                return $this->redirect()->toRoute('acl-role-view', array(
                    'id' => $aclRoleEntity->getAclRoleId()
                ));
            }
        }
        
        return new ViewModel(array(
            'form' => $this->form
        ));
    }
}

