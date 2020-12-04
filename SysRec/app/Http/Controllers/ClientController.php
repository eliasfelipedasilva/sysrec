<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Http\Client\Common\Exception\ClientErrorException;

class ClientController extends Controller
{
	public function index()
	{
		if (!isClient()) {
			return view('client');
		} else {
			return view('product');
		}
	}

	public function register(Request $request)
	{
		$cpf = $request->get("cpf");

		$data = ([
			'infos' => [
				'first_name' => $request->get("first_name"),
				'last_name' => $request->get("last_name"),
				'gender' => $request->get("gender"),
				'phone_number' => $request->get("phone_number"),
				'telephone' => $request->get("telephone"),
				'email' => $request->get("email"),
				'cpf' => $request->get("cpf"),
				'rg' => $request->get("rg"),
				'password' => $request->get("password"),
				'confirm_password' => $request->get("confirm_password"),
				'birth_date' => $request->get("birth_date"),
				'postal_code' => $request->get("postal_code"),
				'street' => $request->get("street"),
				'street_number' => $request->get("street_number"),
				'neighborhood' => $request->get("neighborhood"),
				'city' => $request->get("city"),
				'state' => $request->get("state"),
				'complement' => $request->get("complement")
			]
		]);

		//  try{

		// 	Client::createNodeProperty("Client",$data);
		// }
		// catch(\GraphAware\Neo4j\Client\Exception\Neo4jException $e)){
		// 	echo sprintf('Catched exception, message is "%s"', $e->getMessage());
		// }

		$success = "";
		$error = "";

		if (Client::verificarCpf($cpf)) {
			$error = true;
			return view('register', compact('error', 'data'));
		} else {
			
			Client::createNodeProperty("Client", $data);
			$success = true;
			return view('register', compact('success'));
		}
	}

	public function autenticar(Request $request)
	{
		$u = $request->input("name");
		$p = $request->input("password");
		$auth = new Client();
		if ($auth->autenticar($u, $p) or isClient() == true) {
			$dados = Client::dados($u, $p);
			$r = $dados->getRecord();
			/* Carrega Sessão Cliente e E-mail */
			if (isset($u)) {
				$request->session()->put('client', true);
				$request->session()->put('email', $u);
				$request->session()->put('id', $r->value('id'));
			}
			return redirect('/produtos');
		} else {
			$alert = true;
			return view('client', compact('alert'));
		}
	}

	public function logout()
	{
		session()->forget('id');
		session()->forget('client');
		return redirect('/');
	}

	public function panelCliente()
	{
		if (!isClient()) {
			return view('client');
		} else {
			return view('clientPanel');
		}
	}

	public function consultSale()
	{
		if (!isClient()) {
			return view('client');
		} else {
			$dataOrder = Order::consultOrder(session('id'));
			$data = Order::matchNodeOrder(session('id'));
			return view('consultSale', ['data' => $data->getRecords(), 'dataOrder' => $dataOrder->getRecords()]);
		}
	}

	// public function consultAjax(){
	// 	$nome = "JOSE";
	// 	return view('orderTest',['nome' => $nome]);
	// }

	public function consultAjax($id)
	{
		$dataOrder = Order::consultOrderProd($id);
		return view('orderTest', ['data' => $dataOrder->getRecords()]);
	}

	public function avaliacaoProduto($id)
	{
		if (isClient() == true) {
			$valida = "naoComprou";
			$dados = ([
				"idCli" => session('id'),
				"idProd" => $id
			]);
			if (Client::compraProduto($dados)) {
				$valida = "comprou";
				if (Client::verificaAvaliacao($dados)) {
					$valida = "avaliado";
				}
			}
			//var_dump(Client::compraProduto($dados), Client::verificaAvaliacao($dados));
			$p = Product::matchNodeId("Product", $id);
			return view('avaliacao', ['p' => $p->getRecord(), 'valida' => $valida]);
		} else {
			$alert = true;
			return view('client', compact('alert'));
		}
	}


	public function resultadoAvaliacao(Request $request)
	{
		$rel = ([
			'avaliacao' => $request->input("avaliacao"),
			'recomenda' => $request->input("recomenda"),
			'opiniao' => $request->input("opiniao")
		]);
		$dados = ([
			'idCli' => session('id'),
			'idProd' => $request->input('idProd')
		]);
		Client::gravaAvaliacao($rel, $dados);
		$para = (empty(session('id'))) ? 'null' : session('id');
			$data = Order::matchNodeOrder($para);
			$dataRecom = Product::produtosHome();
			if(Client::qtdClientes()->getRecord()->value('qtd') > 2){
				$recom = Client::cosineSimilarity(Session('id'))->getRecord()->value('recom');
				$dataRecom = Product::baseCosine($recom);
			}
        return view('home', ['data' => $data->getRecords(), 'dataRecom' => $dataRecom->getRecords()]);
	}

	public function consultaCliente(){
		$cliente = Client::consultaCliente(session('id'));
		return view('editClient', ['client' => $cliente->getRecord()]);
	}

	public function update(Request $request){

		$idCli = $request->get("idClient");
		$data = ([
			'infos' => [
				'first_name' => $request->get("first_name"),
				'last_name' => $request->get("last_name"),
				'gender' => $request->get("gender"),
				'phone_number' => $request->get("phone_number"),
				'telephone' => $request->get("telephone"),
				'email' => $request->get("email"),
				'cpf' => $request->get("cpf"),
				'rg' => $request->get("rg"),
				'password' => $request->get("password"),
				'confirm_password' => $request->get("confirm_password"),
				'birth_date' => $request->get("birth_date"),
				'postal_code' => $request->get("postal_code"),
				'street' => $request->get("street"),
				'street_number' => $request->get("street_number"),
				'neighborhood' => $request->get("neighborhood"),
				'city' => $request->get("city"),
				'state' => $request->get("state"),
				'complement' => $request->get("complement"),
			]
		]);
		Client::updateCliente($idCli,$data);
		return redirect('/panelCliente');
	}

	
}
