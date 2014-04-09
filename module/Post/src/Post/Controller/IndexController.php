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

    public function indexAction()
    {
        if($this->getRequest()->isPost()){
            $data = $this->getRequest()->getPost()->toArray();

            foreach($data['post'] as $id){
                $entity = $this->getEm()->getRepository($this->entity)->find($id);
                $this->getEm()->remove($entity);
            }

            $this->getEm()->flush();

            $this->flashMessenger()->addSuccessMessage('Removido com sucesso!');
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
        }

        return parent::indexAction();
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