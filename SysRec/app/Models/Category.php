<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Neo4j\Neo4j;

class Category extends Neo4j
{
    public static function verificarCategoria($name)
    {
        $cypher_query = "MATCH (n:Category) WHERE n.name = '" . $name . "' return n.name";
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    // Seleciona o node retornando nome e id
    public static function matchNode($name)
    {
        $result =  Neo4j::conectar()->run('MATCH (n:' . $name . ') return n.name as name,id(n) as id');
        return $result;
    }

    //Seleciona Node pelo ID, retornando tudo
    public static function matchNodeId($name, $id)
    {
        $result =  Neo4j::conectar()->run('MATCH (n:' . $name . ') where ID(n) = ' . $id . ' return ID(n) as id,n.name as name');
        return $result;
    }
    public static function updateCategoria($id, $infos)
    {
            $cypher_query = "
            MATCH (c:Category) WHERE ID(c) = ".$id."
            SET  
              c.name =  '".$infos['infos']['name']."'
            , c.user =  '".$infos['infos']['user']."'
            , c.create_date =  '".$infos['infos']['create_date']."' ";
            
            return Neo4j::conectar()->run($cypher_query);            
    }

}
