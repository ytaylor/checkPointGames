<?php

class CartLinea
{
    public $referencia;
    public $nombre;
    public $categoria;
    public $cantidad;
    public $price;
    public $stock;

    function setValues($ref, $nom, $cat, $cant,$price, $stock){
       $this->referencia =$ref;
        $this->nombre= $nom;
        $this->cantidad= $cant;
        $this->categoria = $cat;
        $this->price = $price;
        $this->stock = $stock;
    }
    function updateCantidad(){
        $this->cantidad= $this->cantidad+1;
    }
}
