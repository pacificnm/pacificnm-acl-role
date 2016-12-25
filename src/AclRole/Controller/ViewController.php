<?php
namespace AclRole\Controller;

use Application\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;
use AclRole\Service\ServiceInterface;

class ViewController extends AbstractApplicationController
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
     * {@inheritdoc}
     *
     * @see \Application\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();
        
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        if (! $entity) {
            $this->flashMessenger()->addErrorMessage('object was not found');
            
            return $this->redirect()->toRoute('acl-role-index');
        }
        
        $this->getEventManager()->trigger('aclRoleView', $this, array(
            'authId' => $this->identity() ->getAuthId(),
            'requestUrl' => $this->getRequest()->getUri(),
            'aclRoleEntity' => $entity
        ));
        
        return new ViewModel(array(
            'entity' => $entity
        ));
    }
}

