<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Neo4j\Neo4j;

class Admin extends Model
{
    function autenticar($user_name, $password)
    {
        $cypher_query = "MATCH (n:UserAdmin) WHERE n.user_name = '". $user_name ."' and n.password = ". $password ." return n.user_name";
        return Neo4j::conectar()->run($cypher_query)->firstRecordOrDefault(false) ? true : false;
    }
}
