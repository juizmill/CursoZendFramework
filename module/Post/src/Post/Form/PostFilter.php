<?php
namespace Post\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\InArray;
use Zend\Validator\NotEmpty;

class PostFilter extends InputFilter
{
    protected $categoria;
    public function __construct(Array $categoria = array())
    {
        $this->categoria = $categoria;

        $titulo = new Input('titulo');
        $titulo->setRequired(true)
            ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $titulo->getValidatorChain()->attach(new NotEmpty());
        $this->add($titulo);

        $descticao = new Input('descricao');
        $descticao->setRequired(false)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $this->add($descticao);

        $texto = new Input('texto');
        $texto->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $texto->getValidatorChain()->attach(new NotEmpty());
        $this->add($texto);

        $inArray = new InArray();
        $inArray->setOptions(array('haystack' => $this->haystack($this->categoria)));

        $categoria = new Input('category');
        $categoria->setRequired(true)
            ->getFilterChain()->attach(new StripTags())->attach(new StringTrim());
        $categoria->getValidatorChain()->attach($inArray);
        $this->add($categoria);
    }

    /**
     * @param array $haystack
     *
     * @return array
     */
    public function haystack(Array $haystack = array())
    {
        $array = array();
        foreach($haystack as $value){
            if ($value)
                $array[$value['value']] = $value['label'];
        }


        return array_keys($array);
    }

}