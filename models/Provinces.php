<?php


class Provinces
{
    function getData(){

        $sql =  "SELECT id, provincia FROM provincias";
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }


}
