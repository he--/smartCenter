<?php

namespace AppBundle\Mercado;

class Item
{

    private $nome;

    private $preco;

    /**
     * @param $nome
     * @param $preco
     */
    public function __construct($nome, $preco)
    {
        $this->nome = $nome;
        $this->preco = $preco;

    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }
}
