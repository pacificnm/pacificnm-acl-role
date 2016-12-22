<?php
namespace AclRole\Controller;

use Application\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;
use AclRole\Service\ServiceInterface;

class DeleteController extends AbstractApplicationController
{
    /**
     *
     * @var ServiceInterface
     */
    protected $service;
    
    /**
     *
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
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
        
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        if (! $entity) {
            $this->flashmessenger()->addErrorMessage('Object was not found.');
            return $this->redirect()->toRoute('acl-role-index');
        }
        
        if ($request->isPost()) {
            
            $del = $request->getPost('delete_confirmation', 'no');
            
            if ($del === 'yes') {
                
                $this->service->delete($entity);
                
                $this->getEventManager()->trigger('aclRoleDelete', $this, array(
                    'authId' => $this->identity() ->getAuthId(),
                    'historyUrl' => $this->getRequest()->getUri(),
                    'aclRoleEntity' => $entity
                ));
                
                $this->flashmessenger()->addSuccessMessage('Object was deleted');
                
                return $this->redirect()->toRoute('acl-role-index');
            }
            
            return $this->redirect()->toRoute('acl-role-view', array(
                'id' => $id
            ));
        }
        
        return new ViewModel(array(
            'entity' => $entity
        ));
    }
}

