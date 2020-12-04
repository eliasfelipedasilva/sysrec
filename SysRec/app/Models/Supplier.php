<?php

namespace App\Models;

use App\Neo4j\Neo4j;

class Supplier extends Neo4j
{
    public static function verificarCategoria($cnpj)
    {
        $cypher_query = "MATCH (n:Supplier) WHERE n.cnpj = '" . $cnpj . "' return n.cnpj";
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    public static function supplierAll()
    {
        $cypher_query = "MATCH (s:Supplier) return  ID(s) as id, s.name as name";
        return Neo4j::conectar()->run($cypher_query);
    }

    //Seleciona Node pelo ID, retornando tudo
    public static function matchNodeId($name, $id)
    {
        $result =  Neo4j::conectar()->run('MATCH (n:' . $name . ') where ID(n) = ' . $id . ' return ID(n) as id, n.city as city, n.street as street, n.street_number as street_number, n.name as name, n.telephone as telephone, n.phone_number as phone_number, n.neighborhood as neighborhood, n.cnpj as cnpj, n.state as state, n.postal_code as postal_code, n.email as email');
        return $result;
    }

    public static function updateFornecedor($id, $infos){
				
        $cypher_query = "
        MATCH (s:Supplier) WHERE ID(s) = ".$id."
        SET  
         s.city = '".$infos['infos']['city']."' 
        ,s.street = '".$infos['infos']['street']."' 
        ,s.street_number = '".$infos['infos']['street_number']."' 
        ,s.name = '".$infos['infos']['name']."' 
        ,s.telephone = '".$infos['infos']['telephone']."' 
        ,s.phone_number = '".$infos['infos']['phone_number']."' 
        ,s.neighborhood = '".$infos['infos']['neighborhood']."' 
        ,s.cnpj = '".$infos['infos']['cnpj']."' 
        ,s.state = '".$infos['infos']['state']."' 
        ,s.postal_code = '".$infos['infos']['postal_code']."' 
        ,s.complement = '".$infos['infos']['complement']."' 
        ,s.email = '".$infos['infos']['email']."'";

        return Neo4j::conectar()->run($cypher_query);                         
}
}
