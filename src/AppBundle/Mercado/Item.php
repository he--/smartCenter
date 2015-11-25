<?php

namespace AppBundle\Mercado;
/**
 * Created by PhpStorm.
 * User: helio
 * Date: 25/11/15
 * Time: 18:36
 */
class Item
{

    private $nome;

    private $preco;

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