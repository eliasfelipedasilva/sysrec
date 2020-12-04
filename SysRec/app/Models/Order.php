<?php

namespace App\Models;
use App\Neo4j\Neo4j;

class Order extends Neo4j
{
    public static function createNodeOrderProperty($property, $rel)
    {
            $result = Neo4j::conectar()->run('CREATE (o:Order) set o += {infos}
                                        WITH o
                                        MATCH (c:Client) WHERE ID(c) = '.$rel['idCli'].'
                                        CREATE (c)-[r:PURCHASED {date: datetime()}]->(o)
                                        WITH o,c
                                        MATCH (p:Product) WHERE ID(p) = '.$rel['idPro'].'
                                        CREATE (o)-[:ORDERS {date: datetime()}]->(p)
                                        WITH p as k
                                        MATCH(c:Client),(o:Order), (c)-[:PURCHASED]->(o) WHERE o.compra = 0 and ID(c) = '.$rel['idCli'].' 
                                        WITH o.idPro as id, ID(o) as idOrder
                                        MATCH (p:Product) WHERE ID(p) in [id] return ID(p) as idP, p.path_file as file,p.name as name, p.sales_price as price, p.describ as describ, idOrder', $property);
            return $result;
    }
    
    public static function matchNodeOrder($id){
        $result = Neo4j::conectar()->run('MATCH(c:Client),(o:Order), (c)-[:PURCHASED]->(o) WHERE o.compra = 0 and ID(c) = '. $id .'
                                    WITH o.idPro as id, ID(o) as idOrder
                                    MATCH (p:Product) WHERE ID(p) in [id] return ID(p) as idP, p.path_file as file,p.name as name, p.sales_price as price, p.describ as describ, idOrder');
        return $result;
    }

    public static function finalSale($property, $rel){
        $result = Neo4j::conectar()->run('CREATE (o:Order) set o += {infos}
                                WITH o
                                MATCH (c:Client) WHERE ID(c) = '. $rel['idCli'] .'
                                CREATE (c)-[r:PURCHASED {date: datetime()}]->(o)
                                WITH o,c
                                MATCH (p:Product),(k:Order) WHERE k.compra = 0 and ID(p) in k.idPro
                                CREATE (o)-[:ORDERS {date: datetime(), quantity:'.$rel['quantity'].'}]->(p)
                                with p
                                MATCH (d:Client),(d)-[:PURCHASED]->(y:Order) WHERE ID(d) = '. $rel['idCli'] .' and y.compra = 0
                                detach delete y', $property);
        return $result;
    }

    public static function consultOrder($id){
        $result = Neo4j::conectar()->run('MATCH (c:Client),(o:Order), (c)-[pur:PURCHASED]->(o) WHERE o.compra = 1 and ID(c) = '.$id.'
                                    return ID(o) as idOrder, pur.date as dateOrder, o.totalOrder as totalOrder');
        return $result;
    }

    public static function consultOrderProd($id){
        $result = Neo4j::conectar()->run('MATCH (c:Client),(o:Order),(p:Product), (c)-[k:PURCHASED]->(o),(o)-[:ORDERS]->(p:Product) WHERE o.compra = 1 and ID(o) = '.$id.' 
                                    return ID(p) as id, p.path_file as file,p.name as name, p.sales_price as price');

        return $result;
    
    }
}
