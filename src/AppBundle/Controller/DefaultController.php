<?php

namespace AppBundle\Controller;

use AppBundle\Mercado\Mercado;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/index", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $mercado = $request->getSession()->get('mercado');
        $listaItens = $mercado->getFilaItem();

        try{
            $promocao = null;
            if ($request->isMethod('POST')) {
                $promocao = $mercado->promocao();
            }

        } catch (\Exception $e) {
            $request->getSession()->getFlashBag()->add('notice', 'Não ha mais promoçõs!!!');
        }


        return $this->render('default/index.html.twig', array(
            "promocao"  => $promocao,
            "itens"     => $listaItens,
            'base_dir'  => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }


    /**
     * @Route("/", name="start")
     */
    public function startAction(Request $request)
    {

        $mercado = new Mercado();
        $mercado->initEstoque();
        $mercado->persistEstoque();

        $request->getSession()->set('mercado', $mercado);
        return $this->redirect('/index');


    }

}
