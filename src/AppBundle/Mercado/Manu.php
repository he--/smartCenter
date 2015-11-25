<?php
/**
 * Created by PhpStorm.
 * User: helio
 * Date: 25/11/15
 * Time: 19:17
 */

namespace AppBundle\Mercado;


class Manu
{
    private $mercado;

    public function __construct()
    {
        $this->mercado = new Mercado();
    }

    public function startMercado()
    {
        $this->mercado->persistEstoque();
    }

}