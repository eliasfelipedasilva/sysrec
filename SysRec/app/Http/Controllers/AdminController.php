<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
		if (!isAdmin())
		{	
			return view('admin');
		}
		else 
		{
			return view('adminPanel');
		}
	}

	public function autenticar(Request $request)
	{

		$u = $request->input("username");
		$p = $request->input("password");
		$auth = new Admin();


		if($auth->autenticar($u, $p) OR isAdmin() == true)
		{
			/* Carrega Sessão Admin e Nome de Usuário */
			if(isset($u))
			{
				$request->session()->put('admin', true);
				$request->session()->put('user', $u);
			}			
			return view('adminPanel');
		}
		else 
		{
			$alert = "";
			$alert = true;
			return view('admin', compact('alert'));
		}
			

	}

	public function logout()
	{
		session()->forget('admin');
		return redirect()->route('home');
	}
}