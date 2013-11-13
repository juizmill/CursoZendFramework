<?php
namespace Post\Controller;

use Base\Controller\AbstractController;

class IndexController extends AbstractController
{

    function __construct()
    {
        $this->form = 'Post\Form\PostForm';
        $this->controller = 'post';
        $this->route = 'post/default';
        $this->service = 'Post\Service\PostService';
        $this->entity = 'Post\Entity\Post';
    }

    public function inserirAction(){

        $this->form = $this->getServiceLocator()->get($this->form);

        return parent::inserirAction();
    }

    public function editarAction()
    {
        $this->form = $this->getServiceLocator()->get($this->form);

        return parent::editarAction();
    }
}