<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function index()
	{
		if (!isAdmin()) {
			return redirect()->route('home');
		}
		return view('category');
	}

	public function register(Request $request)
	{
		$categoryName =  $request->get("name");
		$data = ([
			'infos' => [
				'name' => $categoryName,
				'user' => userSession(),
				'create_date' => date("Y-m-d H:i:s"),
			]
		]);
		
		$success = "";
		$error = "";

		if(Category::verificarCategoria($categoryName)){
			$error = true;
			return view('category', compact('error'));
		}
		else
		{
			Category::createNodeProperty("Category", $data);
			$success = true;		
			return view('category', compact('success'));
		}
	}

	public function filterProductCategory($category){
		$product = Product::matchNodeProductCat("Product",$category);
		return view('editProduct', ['product' => $product->getRecords(),"type" => "filterProduct"]);
	}

	public function findCategory($category){
		$category = Category::matchNodeId("Category", $category);
		return view('editCategory', ['category' => $category->getRecord()]);
									
	}

	public function selection(){
		$category = Category::matchNode("Category");
		return view('selectionCategory',['category' => $category->getRecords()]);
	}	
	
	public function edit(Request $request){

		$idCat =  $request->get("idCat");
		$data = ([
			'infos' => [
				'name' => $request->get("name"),
				'user' => userSession(),
				'create_date' => date("Y-m-d H:i:s"),
			]
		]);
			
		Category::updateCategoria($idCat, $data);		
		return redirect('/admin');			
	}
}
