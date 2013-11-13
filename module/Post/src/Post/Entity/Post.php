<?php

namespace Post\Entity;

use Base\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post", indexes={@ORM\Index(name="fk_post_categoria_idx", columns={"category"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Post\Entity\PostRepository")
 */
class Post extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=80, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=150, nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="text", nullable=false)
     */
    private $texto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cadastro", type="datetime", nullable=false)
     */
    private $cadastro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="alterado", type="datetime", nullable=true)
     */
    private $alterado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=false)
     */
    private $ativo = '0';

    /**
     * @var \Categoria\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="Categoria\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id")
     * })
     */
    private $category;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Post
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Post
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set texto
     *
     * @param string $texto
     *
     * @return Post
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set cadastro
     *
     * @param \DateTime $cadastro
     * @ORM\PrePersist
     * @return Post
     */
    public function setCadastro()
    {
        $this->cadastro = new \DateTime('now');

        return $this;
    }

    /**
     * Get cadastro
     *
     * @return \DateTime 
     */
    public function getCadastro()
    {
        return $this->cadastro;
    }

    /**
     * Set alterado
     *
     * @param \DateTime $alterado
     * @ORM\PreUpdate
     * @return Post
     */
    public function setAlterado()
    {
        $this->alterado = new \DateTime('now');

        return $this;
    }

    /**
     * Get alterado
     *
     * @return \DateTime 
     */
    public function getAlterado()
    {
        return $this->alterado;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     *
     * @return Post
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set category
     *
     * @param \Categoria\Entity\Category $category
     *
     * @return Post
     */
    public function setCategory(\Categoria\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Categoria\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
