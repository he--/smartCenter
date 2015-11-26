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
     * @var \SplStack;
     */
    private $promocoes;

    /**
     *
     */
    public function __construct()
    {
        $this->filaItem     = new \SplDoublyLinkedList();
        $this->promocoes    = new \SplStack();
    }

    /**
     * @param Item $item
     */
    public function cadastrarItem(Item $item)
    {
        $this->filaItem->push($item);
    }

    public function initEstoque()
    {
        $tvSony = new Item("Tv 42 polegadas sony", 2300.00);
        $notDell = new Item("NoteBook Dell" , 1900.54);

        $this->filaItem->push($tvSony);
        $this->filaItem->push($notDell);

        $this->promocoes->push("TV Sony de RS2300,00 por R$1999,99 ");

    }

    public function cadPromocao($promocao)
    {
        $this->promocoes->push($promocao);
    }

    public function promocao()
    {
        return $this->promocoes->pop();
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

    /**
     * @return \SplDoublyLinkedList
     */
    public function getFilaItem()
    {
        return $this->filaItem;
    }

    /**
     * @param \SplDoublyLinkedList $filaItem
     */
    public function setFilaItem($filaItem)
    {
        $this->filaItem = $filaItem;
    }



}