<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class CartController extends Controller
{

    public function index()
    {
        if (!empty(session('id'))) {
            $result = Order::matchNodeOrder(session('id'));
            $aux = $result->getRecords();
            if(!empty($aux)){
                $data = empty($result) ? null : $result->getRecords();
                $dataRel = empty($result) ? null : Product::matchNodeRel($result->getRecord()->value('idP'));
                return view('cart', ['data' => $data, 'dataRel' => $dataRel->getRecords()]);
            }else{
                $dataRel = Product::bestSellers();
                return view('cart', ['data' => null, 'dataRel' => $dataRel->getRecords()]);
            }
        }else{
            $data = Order::matchNodeOrder('null');
            return view('client', ['data' => null]);
        }
    }
    public function excluir($id)
    {
        $node = array(
            "Node" => "Order",
            "Id" => $id
        );
        Order::deleteNode($node, true);
        return redirect('carrinho');
    }

    public function frete($cep){
        $cep = array('cep' => $cep);
        return view('calculaCep', $cep);
    }
}
