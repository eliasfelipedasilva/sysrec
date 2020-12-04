@extends('layouts.app')
@section('conteudo')
	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
			<div class="container">
				<div class="row">
					<div class="col-md-6 p-b-30">
						<form id="register_form" class="leave-comment" method="POST" action="{{ route('clientUpdate') }}">
						@csrf
							<input type="hidden" value="{{$client->value('id')}}" name="idClient">
							<h4 class="m-text26 p-b-36 p-t-15">
								Registre-se
							</h4>
							<p>Dados Pessoais</p> 
							<br>
							<!-- 
								"gender": "m",
								"city": "Salto Grande",
								"birth_date": "1999-05-31",
								"last_name": "Carlos",
								"telephone": "33225685",
								"confirm_password": "1234",
								"password": "1234",
								"rg": "548087787",
								"street": "Rua Nagib Direne",
								"cpf": "46045792882",
								"street_number": "573",
								"phone_number": "14997184901",
								"neighborhood": "Vila Salto Grande",
								"state": "SP",
								"postal_code": "19.920-202",
								"complement": "casa",
								"first_name": "4544",
								"email": "josecarlos10967@gmail.com"
							-->
							
							<!-- Nome -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" value="{{$client->value('first_name')}}" type="text" id="first_name" name="first_name" placeholder="Primeiro Nome">
							</div>

							<!-- Sobrenome -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" value="{{$client->value('last_name')}}" type="text" name="last_name" placeholder="Sobrenome">
							</div>

							<!-- Gênero -->
							<div class="bo4 of-hidden size15 m-b-20">
								<select class="sizefull s-text7 p-l-22 p-r-22" name="gender">								
									<option <?php if($client->value('gender') == 'm') { echo "selected";}?> value="m">Masculino</option>
									<option <?php if($client->value('gender') == 'w') { echo "selected";}?> value="w">Feminino</option>
								</select>
							</div>

							<!-- Telefone Celular -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sp_celphones sizefull s-text7 p-l-22 p-r-22" value="{{$client->value('phone_number')}}" type="text" name="phone_number" placeholder="Telefone Celular">
							</div>
							
							<!-- Telefone -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sp_celphones sizefull s-text7 p-l-22 p-r-22" value="{{$client->value('telephone')}}" type="text" name="telephone" placeholder="Telefone Residencial">
							</div>

							<!-- E-Mail -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" value="{{$client->value('email')}}" type="email" name="email" placeholder="E-mail">
							</div>

							<!-- C.P.F -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" value="{{$client->value('cpf')}}" type="text" name="cpf" placeholder="CPF">
							</div>

							<!-- RG -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" value="{{$client->value('rg')}}" type="text" name="rg" placeholder="RG">
							</div>

							<!-- Senha -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" id="password" value="{{$client->value('password')}}" type="password" name="password" placeholder="Senha">
							</div>

							<!-- Confirmar Senha -->
							<p id='message'></p>
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" id="confirm_password" value="{{$client->value('confirm_password')}}" type="password" name="confirm_password" placeholder="Confirmar Senha">
							</div>

							<!-- Data do Aniversário -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" type="date" value="{{$client->value('birth_date')}}" name="birth_date" placeholder="Aniversário">
							</div>

							<p>Dados para Entrega</p>

							<!-- CEP -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="cep sizefull s-text7 p-l-22 p-r-22" type="text" value="{{$client->value('postal_code')}}"  id="postal_code" name="postal_code" placeholder="CEP">
							</div>

							<!-- Rua -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" value="{{$client->value('street')}}" name="street" placeholder="Rua">
							</div>

							<!-- Número da Rua -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="number sizefull s-text7 p-l-22 p-r-22" type="text" value="{{$client->value('street_number')}}" name="street_number" placeholder="Número da Rua">
							</div>

							<!-- Bairro -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" value="{{$client->value('neighborhood')}}"  name="neighborhood" placeholder="Bairro">
							</div>

							<!-- Cidade -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" value="{{$client->value('city')}}" name="city" placeholder="Cidade">
							</div>
							<!-- Estado -->
							<div class="bo4 of-hidden size15 m-b-20">
								<select class="sizefull s-text7 p-l-22 p-r-22" name="state" id="state">
									<option value="AC" <?php if($client->value('state') == 'AC') { echo "selected";}?>>Acre</option>
									<option value="AL" <?php if($client->value('state') == 'AL') { echo "selected";}?>>Alagoas</option>
									<option value="AP" <?php if($client->value('state') == 'AP') { echo "selected";}?>>Amapá</option>
									<option value="AM" <?php if($client->value('state') == 'AM') { echo "selected";}?>>Amazonas</option>
									<option value="BA" <?php if($client->value('state') == 'BA') { echo "selected";}?>>Bahia</option>
									<option value="CE" <?php if($client->value('state') == 'CE') { echo "selected";}?>>Ceará</option>
									<option value="DF" <?php if($client->value('state') == 'DF') { echo "selected";}?>>Distrito Federal</option>
									<option value="ES" <?php if($client->value('state') == 'ES') { echo "selected";}?>>Espírito Santo</option>
									<option value="GO" <?php if($client->value('state') == 'GO') { echo "selected";}?>>Goiás</option>
									<option value="MA" <?php if($client->value('state') == 'MA') { echo "selected";}?>>Maranhão</option>
									<option value="MT" <?php if($client->value('state') == 'MT') { echo "selected";}?>>Mato Grosso</option>
									<option value="MS" <?php if($client->value('state') == 'MS') { echo "selected";}?>>Mato Grosso do Sul</option>
									<option value="MG" <?php if($client->value('state') == 'MG') { echo "selected";}?>>Minas Gerais</option>
									<option value="PA" <?php if($client->value('state') == 'PA') { echo "selected";}?>>Pará</option>
									<option value="PB" <?php if($client->value('state') == 'PB') { echo "selected";}?>>Paraíba</option>
									<option value="PR" <?php if($client->value('state') == 'PR') { echo "selected";}?>>Paraná</option>
									<option value="PE" <?php if($client->value('state') == 'PE') { echo "selected";}?>>Pernambuco</option>
									<option value="PI" <?php if($client->value('state') == 'PI') { echo "selected";}?>>Piauí</option>
									<option value="RJ" <?php if($client->value('state') == 'RJ') { echo "selected";}?>>Rio de Janeiro</option>
									<option value="RN" <?php if($client->value('state') == 'RN') { echo "selected";}?>>Rio Grande do Norte</option>
									<option value="RS" <?php if($client->value('state') == 'RS') { echo "selected";}?>>Rio Grande do Sul</option>
									<option value="RO" <?php if($client->value('state') == 'RO') { echo "selected";}?>>Rondônia</option>
									<option value="RR" <?php if($client->value('state') == 'RR') { echo "selected";}?>>Roraima</option>
									<option value="SC" <?php if($client->value('state') == 'SC') { echo "selected";}?>>Santa Catarina</option>
									<option value="SP" <?php if($client->value('state') == 'SP') { echo "selected";}?>>São Paulo</option>
									<option value="SE" <?php if($client->value('state') == 'SE') { echo "selected";}?>>Sergipe</option>
									<option value="TO" <?php if($client->value('state') == 'TO') { echo "selected";}?>>Tocantins</option>
								</select>
							</div>

							<!-- Complemento -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" value="{{$client->value('complement')}}" type="text" name="complement" placeholder="Complemento">
							</div>

							<div class="w-size25">
								<!-- Button -->
								<button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
									Editar
								</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
	@endsection