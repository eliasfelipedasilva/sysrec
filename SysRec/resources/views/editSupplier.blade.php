	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<form id="formfield" class="leave-comment" method="POST" action="{{ route('supplierUpdate') }}" enctype="multipart/form-data">
						
						<input type='hidden' value="{{$supplier->value('id')}}" name="idFor">
						<h4 class="m-text26 p-b-36 p-t-15">
							Editar Fornecedor
						</h4>
						@csrf 
						<p>Dados do Fornecedor</p>
						<br>

						<!-- Nome -->
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" value="{{$supplier->value('name')}}" type="text" name="name" id="name" placeholder="Nome">
						</div>
						<!-- CNPJ -->
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="cnpj sizefull s-text7 p-l-22 p-r-22"  value="{{$supplier->value('cnpj')}}" type="text" name="cnpj" id="cnpj" placeholder="CNPJ" maxlength="18" />
						</div>

						<!-- Telefone Celular -->
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sp_celphones sizefull s-text7 p-l-22 p-r-22"  value="{{$supplier->value('phone_number')}}" type="text" name="phone_number" id="phone_number" placeholder="Telefone Celular">
						</div>

						<!-- Telefone -->
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sp_celphones sizefull s-text7 p-l-22 p-r-22" value="{{$supplier->value('telephone')}}" type="text" name="telephone" id="telephone" placeholder="Telefone Residencial">
						</div>

						<!-- E-Mail -->
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" value="{{$supplier->value('email')}}" type="email" name="email" id="email" placeholder="E-mail">
						</div>


						<p>Localização</p>

						<!-- CEP -->
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="cep sizefull s-text7 p-l-22 p-r-22" value="{{$supplier->value('postal_code')}}" type="text" name="postal_code" id="postal_code" placeholder="CEP">
						</div>

						<!-- Rua -->
						<div class="bo4 of-hidden size15 m-b-20">

							<input required class="sizefull s-text7 p-l-22 p-r-22" value="{{$supplier->value('street')}}" type="text" name="street" id="street" placeholder="Rua">

						</div>

						<!-- Número -->
						<div class="bo4 of-hidden size15 m-b-20">

							<input required class="number sizefull s-text7 p-l-22 p-r-22" value="{{$supplier->value('street_number')}}" type="text" name="street_number" id="street_number" placeholder="Número">

						</div>

						<!-- Bairro -->
						<div class="bo4 of-hidden size15 m-b-20">

							<input required class="sizefull s-text7 p-l-22 p-r-22" value="{{$supplier->value('neighborhood')}}" type="text" name="neighborhood" id="neighborhood" placeholder="Bairro">

						</div>

						<!-- Cidade -->
						<div class="bo4 of-hidden size15 m-b-20">

							<input required class="sizefull s-text7 p-l-22 p-r-22" value="{{$supplier->value('city')}}" type="text" name="city" id="city" placeholder="Cidade">

						</div>

						<!-- Estado -->
						<div class="bo4 of-hidden size15 m-b-20">

							<select class="sizefull s-text7 p-l-22 p-r-22" name="state" id="state">
								<option value="AC" <?php if($supplier->value('state') == 'AC') { echo "selected";}?>>Acre</option>
								<option value="AL" <?php if($supplier->value('state') == 'AL') { echo "selected";}?>>Alagoas</option>
								<option value="AP" <?php if($supplier->value('state') == 'AP') { echo "selected";}?>>Amapá</option>
								<option value="AM" <?php if($supplier->value('state') == 'AM') { echo "selected";}?>>Amazonas</option>
								<option value="BA" <?php if($supplier->value('state') == 'BA') { echo "selected";}?>>Bahia</option>
								<option value="CE" <?php if($supplier->value('state') == 'CE') { echo "selected";}?>>Ceará</option>
								<option value="DF" <?php if($supplier->value('state') == 'DF') { echo "selected";}?>>Distrito Federal</option>
								<option value="ES" <?php if($supplier->value('state') == 'ES') { echo "selected";}?>>Espírito Santo</option>
								<option value="GO" <?php if($supplier->value('state') == 'GO') { echo "selected";}?>>Goiás</option>
								<option value="MA" <?php if($supplier->value('state') == 'MA') { echo "selected";}?>>Maranhão</option>
								<option value="MT" <?php if($supplier->value('state') == 'MT') { echo "selected";}?>>Mato Grosso</option>
								<option value="MS" <?php if($supplier->value('state') == 'MS') { echo "selected";}?>>Mato Grosso do Sul</option>
								<option value="MG" <?php if($supplier->value('state') == 'MG') { echo "selected";}?>>Minas Gerais</option>
								<option value="PA" <?php if($supplier->value('state') == 'PA') { echo "selected";}?>>Pará</option>
								<option value="PB" <?php if($supplier->value('state') == 'PB') { echo "selected";}?>>Paraíba</option>
								<option value="PR" <?php if($supplier->value('state') == 'PR') { echo "selected";}?>>Paraná</option>
								<option value="PE" <?php if($supplier->value('state') == 'PE') { echo "selected";}?>>Pernambuco</option>
								<option value="PI" <?php if($supplier->value('state') == 'PI') { echo "selected";}?>>Piauí</option>
								<option value="RJ" <?php if($supplier->value('state') == 'RJ') { echo "selected";}?>>Rio de Janeiro</option>
								<option value="RN" <?php if($supplier->value('state') == 'RN') { echo "selected";}?>>Rio Grande do Norte</option>
								<option value="RS" <?php if($supplier->value('state') == 'RS') { echo "selected";}?>>Rio Grande do Sul</option>
								<option value="RO" <?php if($supplier->value('state') == 'RO') { echo "selected";}?>>Rondônia</option>
								<option value="RR" <?php if($supplier->value('state') == 'RR') { echo "selected";}?>>Roraima</option>
								<option value="SC" <?php if($supplier->value('state') == 'SC') { echo "selected";}?>>Santa Catarina</option>
								<option value="SP" <?php if($supplier->value('state') == 'SP') { echo "selected";}?>>São Paulo</option>
								<option value="SE" <?php if($supplier->value('state') == 'SE') { echo "selected";}?>>Sergipe</option>
								<option value="TO" <?php if($supplier->value('state') == 'TO') { echo "selected";}?>>Tocantins</option>
							</select>
						</div>

						<!--Submit Button -->
						<div class="w-size25">
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="btn" value="Atualizar">

							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>