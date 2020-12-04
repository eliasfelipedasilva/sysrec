@extends('layouts.app')
@section('conteudo')
<?php
	if (isset($alert))
	{
		?> 
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script> 
			Swal.fire({
			type: 'error',
			title: 'Ops...',
			text: 'Houve falha na autenticação!',
			footer: '<a href>Recuperar senha?</a>'
			})
		</script>
		<?php
	}
?>
<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 p-b-30">	
				<form class="leave-comment" method="POST" action="{{ route('adminPanel') }}">
				@csrf
					<h5 m-text26 p-b-36 p-t-15>Login - Area Administrativa</h5>
					<br>
					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="username" placeholder="Usuário">
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Senha">
					</div>

					<div class="w-size25">
						<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit">
							Entrar
						</button>
					</div>
				</form>
			</div>
		</div>
	<div>
</section>
@endsection