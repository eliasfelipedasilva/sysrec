<?php
	if (!isAdmin())
	{
		return redirect('home');
	}
?>
@extends('layouts.app')
@section('conteudo')
<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 p-b-30">	
				<h5 m-text26 p-b-36 p-t-15>Bem vindo a  Area Administrativa</h5>
				<hr>
					<!-- Supplier's List -->
					<h5 m-text20 p-b-36 p-t-15>Fornecedores</h5>
					<ul>
						<li style="padding-left:2em"><a href="{{ route('supplier') }}">Cadastrar</a></li>
						<li style="padding-left:2em"><a href="{{ route('supplierSelection') }}">Editar</a></li>
					</ul>

					<!-- Category's List -->
					<h5 m-text20 p-b-36 p-t-15>Categorias de Produtos</h5>
					<ul>
						<li style="padding-left:2em"><a href="{{ route('category') }}">Cadastrar</a></li>
						<li style="padding-left:2em"><a href="{{ route('categorySelection') }}">Editar</a></li>
					</ul>

					<!-- Product's List -->
					<h5 m-text20 p-b-36 p-t-15>Produtos</h5>
					<ul>
						<li style="padding-left:2em"><a href="{{ route('product') }}">Cadastrar</a></li>
						<li style="padding-left:2em"><a href="{{ route('productSelection') }}">Editar</a></li>
					</ul>

				<hr>
				<ul>
					<li><a href="{{ route('logout') }}">Logout</a></li>
				</ul>

			</div>
		</div>
	<div>
</section>
@endsection