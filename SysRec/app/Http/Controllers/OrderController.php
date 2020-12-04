<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use GraphAware\Bolt\Protocol\V1\Session;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
		return false;
	}
	
	public function register(Request $request)
	{

		$data = ([
			'infos' => [ 'client_id' => $request->get("client_id"),
						 'order_date' => $request->get("order_date"),
						 'postal_code' => $request->get("postal_code"),
						 'street' => $request->get("street"),
						 'street_number' => $request->get("street_number"),
						 'neighborhood' => $request->get("neighborhood"),
						 'city' => $request->get("city"),
						 'state' => $request->get("state"),	 
						 'complement' => $request->get("complement"),
					   ]
		 ]);
		 Order::createNodeProperty("Order",$data);
		
		return $data;	
	}

	public function finalizar(){
		$data = ([
			'infos' => [
                'compra' => 1,
                'idCli' => intVal(Session('id')),
				'idPro' => null,    
				'discount' => 0,
				'totalOrder' => 150
			]
        ]);
        $rel = ([
			'idCli' => Session('id'),
			'quantity' => 0
		]);
		$data = Order::finalSale($data, $rel);
		$para = (empty(session('id'))) ? 'null' : session('id');
		$data = Order::matchNodeOrder($para);
		$dataRecom = Product::produtosHome();
		if(Client::qtdClientes()->getRecord()->value('qtd') > 2 ){
			$recom = Client::cosineSimilarity(Session('id'));
			if($recom == false){
				$dataRecom = Product::produtosHome();
			}else{
				$recom = Client::cosineSimilarity(Session('id'));
				$dataRecom = Product::baseCosine($recom);
			}
			
		}
        return view('home', ['data' => $data->getRecords(), 'dataRecom' => $dataRecom->getRecords()]);
	}
	
}
