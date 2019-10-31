<?php

class Games
{
    /* Devuelve la informacion de los juegos */
    function getData(){

        if(isset($_SESSION['cat']) AND isset($_SESSION['subcat'])){
            $category= $_SESSION['cat'];
            $subcategory= $_SESSION['subcat'];
            $sql = "SELECT nombre, idGame, nameGame, price, c.idCategory, idSubCategory, description, stock, ofert, new, nameImg FROM games g, category c WHERE g.idCategory = c.idCategory AND g.idCategory = '$category' AND idSubCategory = '$subcategory'";
        }
        else{
            $sql = "SELECT nombre, idGame, nameGame, price, c.idCategory, idSubCategory, description, stock, ofert, new, nameImg FROM games g, category c WHERE g.idCategory = c.idCategory ";
        }
        //obtenemos el array
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }
}