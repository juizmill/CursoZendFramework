<?php
namespace Categoria\Controller;

use Base\Controller\AbstractController;

class IndexController extends AbstractController
{

    function __construct()
    {
        $this->form = 'Categoria\Form\CategoryForm';
        $this->controller = 'categoria';
        $this->route = 'categoria/default';
        $this->service = 'Categoria\Service\CategoriaService';
        $this->entity = 'Categoria\Entity\Category';
    }
}