<?php
namespace AclRole\Controller;

use Application\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;
use AclRole\Service\ServiceInterface;

class IndexController extends AbstractApplicationController
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
        
        $aclRoleName = $this->params()->fromQuery('aclRoleName', null);
        
        $this->getEventManager()->trigger('aclRoleIndex', $this, array(
            'authId' => $this->identity()->getAuthId(),
            'requestUrl' => $this->getRequest()->getUri()
        ));
        
        $filter = array(
            'page' => $this->page,
            'count-per-page' => $this->countPerPage,
            'aclRoleName' => $aclRoleName
        );
        
        $paginator = $this->service->getAll($filter);
        
        $paginator->setCurrentPageNumber($filter['page']);
        
        $paginator->setItemCountPerPage($filter['count-per-page']);
        
        return new ViewModel(array(
            'paginator' => $paginator,
            'page' => $filter['page'],
            'count-per-page' => $filter['count-per-page'],
            'itemCount' => $paginator->getTotalItemCount(),
            'pageCount' => $paginator->count(),
            'queryParams' => $this->params()->fromQuery(),
            'routeParams' => $this->params()->fromRoute()
        ));
    }
}

