<?php
namespace Post;

use Post\Service\PostService;
use Post\Form\PostForm;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Post\Service\PostService' => function($em){
                    return new PostService($em->get('Doctrine\ORM\EntityManager'));
                },
                'Post\Form\PostForm' => function($em){
                    return new PostForm($em->get('Doctrine\ORM\EntityManager'));
                }
            )
        );
    }


}
