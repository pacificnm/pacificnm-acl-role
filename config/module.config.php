<?php
return array(
    'module' => array(
        'AclRole' => array(
            'name' => 'AclRole',
            'version' => '1.0.0',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/acl_role.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'AclRole\Controller\ConsoleController' => 'AclRole\Controller\Factory\ConsoleControllerFactory',
            'AclRole\Controller\CreateController' => 'AclRole\Controller\Factory\CreateControllerFactory',
            'AclRole\Controller\DeleteController' => 'AclRole\Controller\Factory\DeleteControllerFactory',
            'AclRole\Controller\IndexController' => 'AclRole\Controller\Factory\IndexControllerFactory',
            'AclRole\Controller\RestController' => 'AclRole\Controller\Factory\RestControllerFactory',
            'AclRole\Controller\UpdateController' => 'AclRole\Controller\Factory\UpdateControllerFactory',
            'AclRole\Controller\ViewController' => 'AclRole\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'AclRole\Service\ServiceInterface' => 'AclRole\Service\Factory\ServiceFactory',
            'AclRole\Mapper\MysqlMapperInterface' => 'AclRole\Mapper\Factory\MysqlMapperFactory',
            'AclRole\Form\Form' => 'AclRole\Form\Factory\FormFactory'
        )
    ),
    'router' => array(
        'routes' => array(
            'acl-role-create' => array(
                'pageTitle' => 'Acl Role',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin',
                'activeSubMenuItem' => 'acl-index',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/acl-role/create',
                    'defaults' => array(
                        'controller' => 'AclRole\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'acl-role-delete' => array(
                'pageTitle' => 'Acl Role',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin',
                'activeSubMenuItem' => 'acl-index',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/acl-role/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'AclRole\Controller\DeleteController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'acl-role-index' => array(
                'pageTitle' => 'Acl Role',
                'pageSubTitle' => 'Home',
                'activeMenuItem' => 'admin',
                'activeSubMenuItem' => 'acl-index',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/acl-role',
                    'defaults' => array(
                        'controller' => 'AclRole\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'acl-role-rest' => array(
                'pageTitle' => 'Acl Role',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin',
                'activeSubMenuItem' => 'acl-index',
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/acl-role[/:id]',
                    'defaults' => array(
                        'controller' => 'AclRole\Controller\RestController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'acl-role-update' => array(
                'pageTitle' => 'Acl Role',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin',
                'activeSubMenuItem' => 'acl-index',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/acl-role/update/[:id]',
                    'defaults' => array(
                        'controller' => 'AclRole\Controller\UpdateController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'acl-role-view' => array(
                'pageTitle' => 'Acl Role',
                'pageSubTitle' => 'View',
                'activeMenuItem' => 'admin',
                'activeSubMenuItem' => 'acl-index',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/acl-role/view/[:id]',
                    'defaults' => array(
                        'controller' => 'AclRole\Controller\ViewController',
                        'action' => 'index'
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            )
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'acl-role-console-index' => array(
                    'options' => array(
                        'route' => 'acl-role --list',
                        'defaults' => array(
                            'controller' => 'AclRole\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                ),
                'acl-role-console-view' => array(
                    'options' => array(
                        'route' => 'acl-role --view [--id=]',
                        'defaults' => array(
                            'controller' => 'AclRole\Controller\ConsoleController',
                            'action' => 'view'
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    'view_helpers' => array(
        'factories' => array(
            'AclRoleSearchForm' => 'AclRole\View\Helper\Factory\AclRoleSearchFormFactory'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'administrator' => array(
                'acl-role-index',
                'acl-role-create',
                'acl-role-update',
                'acl-role-delete',
                'acl-role-view'
            )
        )
    ),
    'menu' => array(
        'default' => array(
            array(
                'key' => 'admin',
                'name' => 'Admin',
                'icon' => 'fa fa-gear',
                'order' => 99,
                'active' => true,
                'items' => array()
            )
        )
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Admin',
                'route' => 'admin-index',
                'useRouteMatch' => true,
                'pages' => array(
                    array(
                        'label' => 'Acl Role',
                        'route' => 'acl-role-index',
                        'useRouteMatch' => true,
                        'pages' => array(
                            array(
                                'label' => 'View',
                                'route' => 'acl-role-view',
                                'useRouteMatch' => true,
                                'pages' => array(
                                    array(
                                        'label' => 'Edit',
                                        'route' => 'acl-role-update',
                                        'useRouteMatch' => true,
                                    ),
                                    array(
                                        'label' => 'Delete',
                                        'route' => 'acl-role-delete',
                                        'useRouteMatch' => true,
                                    )
                                )
                            ),
                            array(
                                'label' => 'New',
                                'route' => 'acl-role-create',
                                'useRouteMatch' => true,
                            )
                        )
                    )
                )
            )
        )
    )
);