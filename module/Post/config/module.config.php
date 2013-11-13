<?php
namespace Post;

return array(
    'router' => array(
        'routes' => array(
            'post' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/post',
                    'defaults' => array(
                        'controller' => 'Post\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '[/:action[/:id]]',
                            'constraints' => array(
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'         => '\d+'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),

            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Post\Controller\Index' => 'Post\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../../Base/view/layout/layout.phtml',
            'error/404'               => __DIR__ . '/../../Base/view/error/404.phtml',
            'error/index'             => __DIR__ . '/../../Base/view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
    ),
);

