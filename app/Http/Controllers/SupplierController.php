<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

	public function index()
	{
		if (!isAdmin())
        {
            return redirect()->route('home');
		}
		
		return view('supplier');
	}

	public function register(Request $request)
	{

	$supplierCNPJ =  $request->get("cnpj");

		$data = ([
			'infos' => [
				'name' => $request->get("name"),
				'cnpj' => $supplierCNPJ,
				'phone_number' => $request->get("phone_number"),
				'telephone' => $request->get("telephone"),
				'email' => $request->get("email"),
				'postal_code' => $request->get("postal_code"),
				'street' => $request->get("street"),
				'street_number' => $request->get("street_number"),
				'neighborhood' => $request->get("neighborhood"),
				'city' => $request->get("city"),
				'state' => $request->get("state"),
				'complement' => $request->get("complement"),
			]
		]);
	
		$success = "";
		$error = "";

		if(Supplier::verificarCategoria($supplierCNPJ)){
			$error = true;
			return view('supplier', compact('error'));
		}
		else
		{
			Supplier::createNodeProperty("Supplier", $data);
			$success = true;		
			return view('supplier', compact('success'));
		}
	}

	public function selection(){
		$supplier = Supplier::matchNode("Supplier");
		return view('selectionSupplier',['supplier' => $supplier->getRecords()]);
	}

	public function findSupplier($supplier){
		$supplier = Supplier::matchNodeId("Supplier", $supplier);
		return view('editSupplier', ["supplier" => $supplier->getRecord()]);
									
	}


	public function updateSupplier(Request $request){
		
		$idForn = $request->get("idFor");

		$data = ([
			'infos' => [
				'name' => $request->get("name"),
				'cnpj' => $request->get('cnpj'),
				'phone_number' => $request->get("phone_number"),
				'telephone' => $request->get("telephone"),
				'email' => $request->get("email"),
				'postal_code' => $request->get("postal_code"),
				'street' => $request->get("street"),
				'street_number' => $request->get("street_number"),
				'neighborhood' => $request->get("neighborhood"),
				'city' => $request->get("city"),
				'state' => $request->get("state"),
				'complement' => $request->get("complement"),
			]
		]);

		$supplier = Supplier::updateFornecedor($idForn, $data);
		
		return redirect('/admin');
	}
}

