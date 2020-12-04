<?php

namespace App\Models;
use App\Neo4j\Neo4j;

class Client extends Neo4j
{
    public static function verificarCpf($cpf)
    {
    $cypher_query = "MATCH (n:Client) WHERE n.cpf = '". $cpf ."' return n.cpf";
    return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    function autenticar($user_name, $password)
    {
        $cypher_query = "MATCH (n:Client) WHERE n.email = '". $user_name ."' and n.confirm_password = '". $password ."' return n.email";
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    public static function dados($user_name, $password)
    {
        $cypher_query = "MATCH (n:Client) WHERE n.email = '". $user_name ."' and n.confirm_password = '". $password ."' return ID(n) as id, n.email as email, n.name as name";
        return Neo4j::conectar()->run($cypher_query);
    }

    public static function compraProduto($dados){
        $cypher_query = "match(c:Client),(o:Order{compra:1}),(p:Product), (c)-[:PURCHASED]->(o)-[:ORDERS]->(p)  where ID(p) = ". $dados['idProd']. " AND ID(c) = ". $dados['idCli']. " return p.name";
        //var_dump($cypher_query);
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    public static function verificaAvaliacao($dados){
        $cypher_query = "match(c:Client),(p:Product),(c)-[:RATING]->(p) where ID(c) = ". $dados['idCli'] ." AND ID(p) = ". $dados['idProd'] ." return p.name";
        //var_dump($cypher_query);
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    public static function gravaAvaliacao($rel, $dados)
    {
        
        $cypher_query = "match(c:Client),(p:Product) WHERE ID(c) = ".$dados['idCli'] ." and ID(p) = ". $dados['idProd'] ." 
        CREATE (c)-[ r: RATING {description: '". $rel['opiniao']."' , rating: ". $rel['avaliacao'] .", recommend: ". $rel['recomenda'] ."}]->(p)
        return *";
        return Neo4j::conectar()->run($cypher_query);
    }

    public static function cosineSimilarity($id)
    {
        
        $cypher_query = "MATCH (p1:Client),(p2:Client) where ID(p1) = ".$id." and ID(p2) <> ".$id."
                            WITH p1,p2
                            MATCH (p1)-[x:RATING]->(p:Product)<-[y:RATING]-(p2:Client)
                            WITH COUNT(p) AS numberProduct, SUM(x.rating * y.rating) AS xyDotProduct,
                            SQRT(REDUCE(xDot = 0.0, a IN COLLECT(x.rating) | xDot + a^2)) AS xLength,
                            SQRT(REDUCE(yDot = 0.0, b IN COLLECT(y.rating) | yDot + b^2)) AS yLength,
                            p1, p2 WHERE numberProduct > 0
                            RETURN p1.first_name, ID(p2) as recom, xyDotProduct / (xLength * yLength) AS sim
                            ORDER BY sim DESC
                            LIMIT 1";
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? Neo4j::conectar()->run($cypher_query) : false;;
    }


    public static function verificaCompraCliente($id)
    {
        $cypher_query = "match (c:Client),(c)-[r:PURCHASED]->(o:Order) where ID(c) = ".$id." and o.compra = 1 return c.first_name";
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }

    public static function updateCliente($id,$infos){
				
        $cypher_query = "
        MATCH (c:Client) WHERE ID(c) = ".$id."
        SET  
        c.gender =  '".$infos['infos']['gender']."'
        , c.city =  '".$infos['infos']['city']."'
        , c.birth_date =  '".$infos['infos']['birth_date']."'
        , c.last_name = '".$infos['infos']['last_name']."'
        , c.telephone = '".$infos['infos']['telephone']."'
        , c.confirm_password = '".$infos['infos']['confirm_password']."'
        , c.password = '".$infos['infos']['password']."'
        , c.rg = '".$infos['infos']['rg']."'
        , c.street = '".$infos['infos']['street']."'
        , c.cpf = '".$infos['infos']['cpf']."'
        , c.street_number = '".$infos['infos']['street_number']."'
        , c.phone_number = '".$infos['infos']['phone_number']."'
        , c.neighborhood = '".$infos['infos']['neighborhood']."'
        , c.state = '".$infos['infos']['state']."'
        , c.postal_code = '".$infos['infos']['postal_code']."'
        , c.complement = '".$infos['infos']['complement']."'
        , c.first_name = '".$infos['infos']['first_name']."'
        , c.email = '".$infos['infos']['email']."' ";
        return Neo4j::conectar()->run($cypher_query);                         
}

public static function consultaCliente($id)
{
        $cypher_query = " match(c:Client) where ID(c) = ".$id." return 
        ID(c) as id,
        c.first_name as first_name,
        c.last_name as last_name,
        c.gender as gender,
        c.phone_number as phone_number,
        c.telephone as telephone,
        c.email as email,
        c.cpf as cpf,
        c.rg as rg,
        c.password as password,
        c.confirm_password as confirm_password,
        c.birth_date as birth_date,
        c.postal_code as postal_code,
        c.street as street,
        c.street_number as street_number,
        c.neighborhood as neighborhood,
        c.city as city,
        c.state as state,
        c.complement as complement ";
        return Neo4j::conectar()->run($cypher_query);      
}

public static function qtdClientes(){
    $cypher_query = "match(c:Client),(c)-[r:PURCHASED]->(o:Order) where o.compra = 1  return COUNT(distinct(c.first_name)) as qtd";
    return Neo4j::conectar()->run($cypher_query);
}


}
