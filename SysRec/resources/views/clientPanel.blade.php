<?php
	if (!isClient())
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
				<h5 m-text26 p-b-36 p-t-15>Bem vindo a Área de Cliente</h5>
				<hr>
					<!-- Supplier's List -->
					<h5 m-text20 p-b-36 p-t-15>Compras</h5>
					<ul>
						<li style="padding-left:2em"><a href="{{ route('consultSale') }}">Consultar compras</a></li>
						<li style="padding-left:2em"><a href="{{ route('updateClient') }}">Editar Perfil</a></li>
					</ul>
				<hr>
				<ul>
					<li><a href="{{ route('logoutCliente') }}">Logout</a></li>
				</ul>

			</div>
		</div>
	<div>
</section>
@endsection