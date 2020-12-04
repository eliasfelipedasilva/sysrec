@extends('layouts.app')
@section('conteudo')

	<body class="animsition">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!-- CONFLITO COM O CEP <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
		<script type="text/javascript" src="{{ URL::asset('js/client-register.js') }}"></script>
		<script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
		<script type="text/javascript" src="jquery.maskedinput-1.1.4.pack.js"/></script>
		<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

		<?php
	/* 
     * Condições de sucesso ou erro ao cadastrar nova categoria.
	 */ 
	if(isset($success))
	{
		?>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script> 
		Swal.fire(
				'Sucesso!',
				'Cliente Cadastrado!',
				'success'
				)
		</script>
		<?php
	}
	if(isset($error))
	{
		?>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script> 
			Swal.fire({
			type: 'error',
			title: 'Ops...',
			text: 'Cliente ja existe!'
			})
		</script>
		<?php
	}
?>
	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
			<div class="container">
				<div class="row">
					<div class="col-md-6 p-b-30">
						<form id="register_form" class="leave-comment" method="POST" action="{{ route('clientRegister') }}"  enctype="multipart/form-data">
						@csrf
							<h4 class="m-text26 p-b-36 p-t-15">
								Registre-se
							</h4>
							<p>Dados Pessoais</p> 
							<br>

							<!-- Nome -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" id="first_name" name="first_name" placeholder="Primeiro Nome">
							</div>

							<!-- Sobrenome -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="last_name" placeholder="Sobrenome">
							</div>

							<!-- Gênero -->
							<div class="bo4 of-hidden size15 m-b-20">
								<select class="sizefull s-text7 p-l-22 p-r-22" name="gender">
									<option value="" selected disabled hidden>Sexo</option>
									<option value="m">Masculino</option>
									<option value="w">Feminino</option>
								</select>
							</div>

							<!-- Telefone Celular -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sp_celphones sizefull s-text7 p-l-22 p-r-22" type="text" name="phone_number" placeholder="Telefone Celular">
							</div>
							
							<!-- Telefone -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sp_celphones sizefull s-text7 p-l-22 p-r-22" type="text" name="telephone" placeholder="Telefone Residencial">
							</div>

							<!-- E-Mail -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="E-mail">
							</div>

							<!-- C.P.F -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cpf" placeholder="CPF">
							</div>

							<!-- RG -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="rg" placeholder="RG">
							</div>

							<!-- Senha -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" id="password" type="password" name="password" placeholder="Senha">
							</div>

							<!-- Confirmar Senha -->
							<p id='message'></p>
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" id="confirm_password" type="password" name="confirm_password" placeholder="Confirmar Senha">
							</div>

							<!-- Data do Aniversário -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" type="date" name="birth_date" placeholder="Aniversário">
							</div>

							<p>Dados para Entrega</p>

							<!-- CEP -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="cep sizefull s-text7 p-l-22 p-r-22" type="text" id="postal_code" name="postal_code" placeholder="CEP">
							</div>

							<!-- Rua -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="street" placeholder="Rua">
							</div>

							<!-- Número da Rua -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="number sizefull s-text7 p-l-22 p-r-22" type="text" name="street_number" placeholder="Número da Rua">
							</div>

							<!-- Bairro -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="neighborhood" placeholder="Bairro">
							</div>

							<!-- Cidade -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="city" placeholder="Cidade">
							</div>

							<!-- Estado -->
							<div class="bo4 of-hidden size15 m-b-20">
								<select class="sizefull s-text7 p-l-22 p-r-22" name="state">
									<option value="" selected disabled hidden>Escolha um estado</option>
									<option value="AC">Acre</option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amapá</option>
									<option value="AM">Amazonas</option>
									<option value="BA">Bahia</option>
									<option value="CE">Ceará</option>
									<option value="DF">Distrito Federal</option>
									<option value="ES">Espírito Santo</option>
									<option value="GO">Goiás</option>
									<option value="MA">Maranhão</option>
									<option value="MT">Mato Grosso</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Pará</option>
									<option value="PB">Paraíba</option>
									<option value="PR">Paraná</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piauí</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rondônia</option>
									<option value="RR">Roraima</option>
									<option value="SC">Santa Catarina</option>
									<option value="SP">São Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
								</select>
							</div>

							<!-- Complemento -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="complement" placeholder="Complemento">
							</div>

							<div class="w-size25">
								<!-- Button -->
								<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
									Registrar
								</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
	@endsection