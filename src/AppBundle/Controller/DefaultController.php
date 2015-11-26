<?php

namespace AppBundle\Controller;

use AppBundle\Mercado\Mercado;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $mercado = new Mercado();
        $mercado->initEstoque();
        $mercado->persistEstoque();
        $listaItens = $mercado->getFilaItem();

        $promocao = null;
        if ($request->isMethod('POST')) {
           $promocao = $mercado->promocao();
        }

        return $this->render('default/index.html.twig', array(
            "promocao"  => $promocao,
            "itens"     => $listaItens,
            'base_dir'  => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
