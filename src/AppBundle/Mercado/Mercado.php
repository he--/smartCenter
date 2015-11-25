<?php
/**
 * Created by PhpStorm.
 * User: helio
 * Date: 25/11/15
 * Time: 18:38
 */

namespace AppBundle\Mercado;


class Mercado
{
    /**
     * @var \SplDoublyLinkedList Item
     */
    private $filaItem;

    /**
     *
     */
    public function __construct()
    {
        $this->filaItem = new \SplDoublyLinkedList();
    }

    /**
     * @param Item $item
     */
    public function cadastrarItem(Item $item)
    {
        $this->filaItem->push($item);
    }

    /**
     * @param Item $item
     */
    public function removerItem(Item $item)
    {
        for ($i = 0; $i < $this->filaItem->count(); $i++) {
            $elemento = $this->filaItem->current();
            if ($elemento->getNome === $item->getNome()) {
                $this->filaItem->offsetUnset($i);
            }
        }

    }

    /**
     *
     */
    public function persistEstoque()
    {
        $texto = $this->filaItem->serialize();
        $fp = fopen("arquivo.txt", 'a');
        fwrite($fp, $texto);
        fclose($fp);
    }

    /**
     *
     */
    public function lerEstoque()
    {
        $fp = file_get_contents('arquivo.txt');
        $this->filaItem->unserialize($fp);
        fclose($fp);
    }

}