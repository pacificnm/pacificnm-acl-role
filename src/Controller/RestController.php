<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-acl-role for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-acl-role/blob/master/LICENSE.md
 */
namespace Pacificnm\AclRole\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Pacificnm\AclRole\Service\ServiceInterface;
use Pacificnm\AclRole\Form\Form;

class RestController extends AbstractRestfulController
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
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractRestfulController::create()
     */
    public function create($data)
    {
        $this->response->setStatusCode(405);
        
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractRestfulController::delete()
     */
    public function delete($id)
    {
        $this->response->setStatusCode(405);
        
        return new JsonModel(array(
            "content" => "Method Not Allowed"
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractRestfulController::deleteList()
     */
    public function deleteList($data)
    {
        $this->response->setStatusCode(405);
        
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractRestfulController::get()
     */
    public function get($id)
    {
        $entity = $this->service->get($id);
        
        if (! $entity) {
            $this->response->setStatusCode(403);
            
            return new JsonModel(array(
                'content' => 'Object not found'
            ));
        }
        
        $data = array(
            'aclRoleId' => $entity->getAclRoleId(),
            'aclRoleName' => $entity->getAclRoleName()
        );
        
        return new JsonModel(array(
            'content' => $data
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractRestfulController::getList()
     */
    public function getList($params)
    {
        $page = $this->params()->fromQuery('page', 1);
        
        $countPerPage = $this->params()->fromQuery('countPerPage', 25);
        
        $filter = array();
        
        $entitys = $this->service->getAll($filter);
        
        $paginator = $this->service->getAll($filter);
        
        $paginator->setCurrentPageNumber($page);
        
        $paginator->setItemCountPerPage($countPerPage);
        
        $data = array();
        
        foreach ($paginator as $entity) {
            $data[] = array(
                'aclRoleId' => $entity->getAclRoleId(),
                'aclRoleName' => $entity->getAclRoleName()
            );
        }
        
        return new JsonModel(array(
            'content' => $data,
            'page' => $page,
            'countPerPage' => $countPerPage,
            'itemCount' => $paginator->getTotalItemCount(),
            'pageCount' => $paginator->count()
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractRestfulController::head()
     */
    public function head($id)
    {
        $this->response->setStatusCode(405);
        
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractRestfulController::options()
     */
    public function options()
    {
        $this->response->setStatusCode(405);
        
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractRestfulController::patch()
     */
    public function patch($id, $data)
    {
        $this->response->setStatusCode(405);
        
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractRestfulController::replaceList()
     */
    public function replaceList($data)
    {
        $this->response->setStatusCode(405);
        
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractRestfulController::patchList()
     */
    public function patchList($data)
    {
        $this->response->setStatusCode(405);
        
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractRestfulController::update()
     */
    public function update($id, $data)
    {
        $this->response->setStatusCode(405);
        
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractRestfulController::notFoundAction()
     */
    public function notFoundAction()
    {
        $this->response->setStatusCode(404);
        
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
}

