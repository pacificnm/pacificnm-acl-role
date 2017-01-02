<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-acl-role for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-acl-role/blob/master/LICENSE.md
 */
namespace Pacificnm\AclRole\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Pacificnm\AclRole\Hydrator\Hydrator;
use Pacificnm\AclRole\Entity\Entity;

class Form extends ZendForm implements InputFilterProviderInterface
{

    /**
     *
     * @param string $name            
     * @param array $options            
     */
    public function __construct($name = 'acl-role-form', $options = array())
    {
        parent::__construct($name, $options);
        
        $this->setHydrator(new Hydrator(false));
        
        $this->setObject(new Entity());
        
        // aclRoleId
        $this->add(array(
            'name' => 'aclRoleId',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'aclRoleId'
            )
        ));
        
        // aclRoleName
        $this->add(array(
            'name' => 'aclRoleName',
            'type' => 'Text',
            'options' => array(
                'label' => 'Role Name:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'aclRoleName'
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'button',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submit',
                'class' => 'btn btn-primary btn-flat'
            )
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return array(
            // aclRoleId
            'aclRoleId' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ),
            // aclRoleName
            'aclRoleName' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => "The Acl Role Name is required and cannot be empty."
                            )
                        )
                    )
                )
            )
        );
    }
}

