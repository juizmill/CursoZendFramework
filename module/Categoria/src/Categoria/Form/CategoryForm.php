<?php
namespace Categoria\Form;

use Zend\Form\Element\Button;
use Zend\Form\Element\Text;
use Zend\Form\Form;

use Categoria\Form\CategoryFilter;

class CategoryForm extends Form
{
    public function __construct()
    {
        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setInputFilter(new CategoryFilter());

        //Input nome
        $nome = new Text('nome');
        $nome->setLabel('Nome')
            ->setAttributes(array(
                    'maxlength' => 45
                ));
        $this->add($nome);

        //Botao submit
        $button = new Button('submit');
        $button->setLabel('Salvar')
            ->setAttributes(array(
                    'type' => 'submit',
                    'class' => 'btn'
                ));
        $this->add($button);
    }

}