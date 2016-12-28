<?php
namespace AclRole\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use AclRole\Form\Form;

class FormFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \AclRole\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new Form();
    }
}

