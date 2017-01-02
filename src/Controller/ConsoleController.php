<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-acl-role for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-acl-role/blob/master/LICENSE.md
 */
namespace Pacificnm\AclRole\Controller;

use RuntimeException;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\Adapter\AdapterInterface;
use Zend\Console\Request as ConsoleRequest;
use Pacificnm\AclRole\Service\ServiceInterface;

class ConsoleController extends AbstractActionController
{

    /**
     *
     * @var ServiceInterface
     */
    protected $service;

    /**
     *
     * @var AdapterInterface
     */
    protected $console;

    /**
     *
     * @param AdapterInterface $console            
     * @param ServiceInterface $service            
     * @throws RuntimeException
     */
    public function __construct(AdapterInterface $console, ServiceInterface $service)
    {
        $this->service = $service;
        
        $this->console = $console;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Application\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        $request = $this->getRequest();
        
        // validate we are in a console
        if (! $request instanceof ConsoleRequest) {
            throw new RuntimeException('Cannot handle request of type ' . get_class($request));
        }
        
        $table = new \Zend\Text\Table\Table(array(
            'columnWidths' => array(
                20,
                30
            )
        ));
        
        $entitys = $this->service->getAll(array(
            'pagination' => 'off'
        ));
        
        $table->appendRow(array(
            'ACL Role Id',
            'ACL Role Name'
        ));
        
        foreach ($entitys as $entity) {
            $table->appendRow(array(
                $entity->getAclRoleId(),
                $entity->getAclRoleName()
            ));
        }
        
        echo $table;
        
        $end = date('m/d/Y h:i a', time());
        
        $this->console->write("Completed acl role list at {$end}\n");
    }

    public function viewAction()
    {
        $request = $this->getRequest();
        
        // validate we are in a console
        if (! $request instanceof ConsoleRequest) {
            throw new RuntimeException('Cannot handle request of type ' . get_class($request));
        }
        
        $id = $this->params('id');
        
        $entity = $this->service->get($id);
        
        if (! $entity) {
            throw new \RuntimeException('Object not found');
        }
        
        $table = new \Zend\Text\Table\Table(array(
            'columnWidths' => array(
                20,
                30
            )
        ));
        
        $table->appendRow(array(
            'ACL Role Id',
            'ACL Role Name'
        ));
        
        $table->appendRow(array(
            $entity->getAclRoleId(),
            $entity->getAclRoleName()
        ));
        
        echo $table;
        
        $end = date('m/d/Y h:i a', time());
        
        $this->console->write("Completed acl role view at {$end}\n");
    }
}

