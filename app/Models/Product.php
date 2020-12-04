<?php

namespace App\Models;

use App\Neo4j\Neo4j;

class Product extends Neo4j
{

        public static function createNodeProductProperty($node, $property, $rel)
        {
                Neo4j::conectar()->run('CREATE (n:' . $node . ') SET n += {infos}
                                    WITH n
                                    MATCH(m:Category)
                                    WHERE ID(m) = ' . $rel['idOne'] . '
                                    CREATE (n)-[:PART_OF]->(m)
                                    WITH n
                                    MATCH(s:Supplier)
                                    WHERE ID(s) = ' . $rel['idTwo'] . '
                                    CREATE (n)<-[:SUPPLIES]-(s)
                                    RETURN *', $property);
        }

        public static function alterNodeProductProperty($property){
                Neo4j::conectar()->run('');
        }

        public static function matchNodeProduct($name)
        {
                $result =  Neo4j::conectar()->run('MATCH (n:' . $name . ') return n.name as name,
                id(n) as id, n.path_file as file, n.sales_price as price');
                return $result;
        }

        //Filtrando por Categoria
        public static function matchNodeProductCat($name, $id)
        {
                $result =  Neo4j::conectar()->run('MATCH (n:' . $name . '),(c:Category),(n)-[:PART_OF]->(c) where ID(c) = ' . $id . '  return n.name as name,
                id(n) as id, n.path_file as file, n.sales_price as price ');
                return $result;
        }

        //Seleciona Node pelo ID, retornando tudo
        public static function matchNodeId($name, $id)
        {
                $result =  Neo4j::conectar()->run('MATCH (n:' . $name . '),(n)-[:PART_OF]->(k) where ID(n) = ' . $id . ' return ID(n) as id, n.path_file as file,n.name as name, n.sales_price as price, n.describ as describ, k.name as category, ID(k) as catId, n.supplier_id as supId, n.costs_price as costs_price,n.width as width, n.weight as weight, n.height as height, n.depth as depth, n.sac as sac');
                return $result;
        }

        //Relacionados seleciona Node pelo ID, retornando tudo
        public static function matchNodeRel($id)
        {
                $result =  Neo4j::conectar()->run('MATCH (p:Product),(p)-[:PART_OF]->(c),(c)<-[:PART_OF]-(p2) where ID(p) = '.$id.' return p2.path_file as file,p2.name as name, p2.sales_price as price, p2.describ as describ, ID(p2) as id');
                return $result;
        }

        public static function matchNodePrice($inf, $sup){
                $result = Neo4j::conectar()->run('match(n:Product) where n.sales_price > "'.$inf.'" and n.sales_price < "'.$sup.'" return ');
        }

        //Recomendação Filtragem Colaborativa
        public static function collaborativeFiltration($id)
        {
                $cypher_query = "match(c:Client), (c)-[:PURCHASED]->(o:Order{compra:1})-[:ORDERS]->(p)<-[:ORDERS]-(o2)<-[:PURCHASED]-(c2) WHERE ID(c) = ".$id."
                                with COUNT(p.name) AS tam, ID(c2) AS id, c2 
                                with max(c2{tam, id}['id']) as idCli
                                match(cc:Client),(cc)-[:PURCHASED]->(o3)-[:ORDERS]->(p3) where ID(cc) = idCli
                                return p3.path_file as file,p3.name as name, p3.sales_price as price, p3.describ as describ, ID(p3) as id";
            return Neo4j::conectar()->run($cypher_query);
        }

                //Recomendação Filtragem Colaborativa
        public static function baseCosine($id)
                {
                $cypher_query = "match(c:Client),(c)-[r:PURCHASED]->()-[:ORDERS]->(p3:Product) where ID(c) = ".$id." 
                                        return distinct(p3.path_file) as file,p3.name as name, p3.sales_price as price, p3.describ as describ, ID(p3) as id";
                    return Neo4j::conectar()->run($cypher_query);
                }



        //Recomendação dos mais vendidos
        public static function bestSellers(){
                $cypher_query = "match(p:Product),(o:Order),(o)-[r:ORDERS]->(p)
                                        return COUNT(o) as qtd, p.path_file as file,p.name as name, p.sales_price as price, p.describ as describ, ID(p) as id
                                        ORDER BY qtd
                                        DESC
                                        LIMIT 20";
                return Neo4j::conectar()->run($cypher_query);                         
        }

        public static function productRating($id){
                $cypher_query = "match(p:Product), (:Client)-[r:RATING]-(p) where ID(p) = ". $id ." return avg(r.rating) as rat";
                return Neo4j::conectar()->run($cypher_query);                         
        }

        public static function produtosHome(){
                $cypher_query = "match(p:Product) return p.path_file as file,p.name as name, p.sales_price as price, p.describ as describ, ID(p) as id ORDER BY p.name DESC";
                return Neo4j::conectar()->run($cypher_query);                         
        }

        public static function updateProduto($id,$infos){

                $cypher_query = "match(p:Product) where ID(p) = ".$id." set 
                p.name = '".$infos['infos']['name']."' 
                , p.category_id = ".$infos['infos']['category_id']."
                , p.supplier_id = ".$infos['infos']['supplier_id']." 
                , p.sales_price = ".$infos['infos']['sales_price']."
                , p.describ = '".$infos['infos']['describ']."' 
                , p.height = ".$infos['infos']['height']."
                , p.width = ".$infos['infos']['width']."
                , p.depth = ".$infos['infos']['depth']."
                , p.weight = ".$infos['infos']['weight']."
                , p.sac = '".$infos['infos']['sac']."'
                , p.path_file = '".$infos['infos']['path_file']."'";

                //var_dump($cypher_query);
                return Neo4j::conectar()->run($cypher_query);                         
        }

}
