<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-acl-role for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-acl-role/blob/master/LICENSE.md
 */
return array(
    'module' => array(
        'AclRole' => array(
            'name' => 'AclRole',
            'version' => '1.0.5',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/acl_role.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Pacificnm\AclRole\Controller\ConsoleController' => 'Pacificnm\AclRole\Controller\Factory\ConsoleControllerFactory',
            'Pacificnm\AclRole\Controller\CreateController' => 'Pacificnm\AclRole\Controller\Factory\CreateControllerFactory',
            'Pacificnm\AclRole\Controller\DeleteController' => 'Pacificnm\AclRole\Controller\Factory\DeleteControllerFactory',
            'Pacificnm\AclRole\Controller\IndexController' => 'Pacificnm\AclRole\Controller\Factory\IndexControllerFactory',
            'Pacificnm\AclRole\Controller\RestController' => 'Pacificnm\AclRole\Controller\Factory\RestControllerFactory',
            'Pacificnm\AclRole\Controller\UpdateController' => 'Pacificnm\AclRole\Controller\Factory\UpdateControllerFactory',
            'Pacificnm\AclRole\Controller\ViewController' => 'Pacificnm\AclRole\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Pacificnm\AclRole\Service\ServiceInterface' => 'Pacificnm\AclRole\Service\Factory\ServiceFactory',
            'Pacificnm\AclRole\Mapper\MysqlMapperInterface' => 'Pacificnm\AclRole\Mapper\Factory\MysqlMapperFactory',
            'Pacificnm\AclRole\Form\Form' => 'Pacificnm\AclRole\Form\Factory\FormFactory'
        )
    ),
    'router' => array(
        'routes' => array(
            'acl-role-create' => array(
                'pageTitle' => 'Acl Role',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'icon' => 'fa fa-lock',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/acl-role/create',
                    'defaults' => array(
                        'controller' => 'Pacificnm\AclRole\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'acl-role-delete' => array(
                'pageTitle' => 'Acl Role',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'icon' => 'fa fa-lock',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/acl-role/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\AclRole\Controller\DeleteController',
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
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'icon' => 'fa fa-lock',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/acl-role',
                    'defaults' => array(
                        'controller' => 'Pacificnm\AclRole\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'acl-role-rest' => array(
                'pageTitle' => 'Acl Role',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'icon' => 'fa fa-lock',
                'layout' => 'rest',
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/acl-role[/:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\AclRole\Controller\RestController',
                    ),
                    'constraints' => array(
                        'id' => '[0-9]+'
                    )
                )
            ),
            'acl-role-update' => array(
                'pageTitle' => 'Acl Role',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'icon' => 'fa fa-lock',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/acl-role/update/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\AclRole\Controller\UpdateController',
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
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'acl-index',
                'icon' => 'fa fa-lock',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/acl-role/view/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\AclRole\Controller\ViewController',
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
                            'controller' => 'Pacificnm\AclRole\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                ),
                'acl-role-console-view' => array(
                    'options' => array(
                        'route' => 'acl-role --view [--id=]',
                        'defaults' => array(
                            'controller' => 'Pacificnm\AclRole\Controller\ConsoleController',
                            'action' => 'view'
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Pacificnm\AclRole' => true
        ),
        'template_map' => array(
            'pacificnm/acl-role/create/index' => __DIR__ . '/../view/acl-role/create/index.phtml',
            'pacificnm/acl-role/delete/index' => __DIR__ . '/../view/acl-role/delete/index.phtml',
            'pacificnm/acl-role/index/index' => __DIR__ . '/../view/acl-role/index/index.phtml',
            'pacificnm/acl-role/update/index' => __DIR__ . '/../view/acl-role/update/index.phtml',
            'pacificnm/acl-role/view/index' => __DIR__ . '/../view/acl-role/view/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    'view_helpers' => array(
        'factories' => array(
            'AclRoleSearchForm' => 'Pacificnm\AclRole\View\Helper\Factory\AclRoleSearchFormFactory'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'user' => array(),
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
                'name' => 'Admin',
                'route' => 'admin-index',
                'icon' => 'fa fa-gear',
                'order' => 99,
                'location' => 'left',
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