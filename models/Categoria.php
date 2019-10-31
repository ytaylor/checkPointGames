<?php


class Categoria
{
    function getData(){
        $sql = "SELECT idCategory, nombre, icon FROM category";
        //obtenemos el array
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }

    function getDataSubcategorias($idcategory){
        $sql = "SELECT nombreSub, idCategory, c.idSubCategory FROM subcategory s, categorysubcategory c 
                WHERE  c.idCategory =".$idcategory." AND
                s.idSubCategory = c.idSubCategory";
        //obtenemos el array
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }
}
