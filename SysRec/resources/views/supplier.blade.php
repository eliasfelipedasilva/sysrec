@extends('layouts.app')
@section('conteudo')


		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!-- CONFLITO COM O CEP <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>           
		<script type="text/javascript" src="{{ URL::asset('js/jquery.mask.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/supplier-register.js') }}"></script>
		<script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
		<script type="text/javascript" src="jquery.maskedinput-1.1.4.pack.js"/></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
				'Novo Fornecedor Cadastrado!',
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
			text: 'Fornecedor ja existe!'
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
						<form id="formfield" class="leave-comment" method="POST" action="{{ route('supplierRegister') }}">
						@csrf
							<h4 class="m-text26 p-b-36 p-t-15">
								Registro de Fornecedor
							</h4>
							<p>Dados do Fornecedor</p> 
							<br>

							<!-- Nome -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" id="name" placeholder="Nome">
							</div>
           				   <!-- CNPJ -->
              				<div class="bo4 of-hidden size15 m-b-20">
								<input required class="cnpj sizefull s-text7 p-l-22 p-r-22" type="text" name="cnpj" id="cnpj" placeholder="CNPJ" maxlength="18"/>
							</div>

							<!-- Telefone Celular -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sp_celphones sizefull s-text7 p-l-22 p-r-22" type="text" name="phone_number" id="phone_number" placeholder="Telefone Celular">
							</div>
							
							<!-- Telefone -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input class="sp_celphones sizefull s-text7 p-l-22 p-r-22" type="text" name="telephone" id="telephone" placeholder="Telefone Residencial">
							</div>

							<!-- E-Mail -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" id="email" placeholder="E-mail">
              </div>
              

            	<p>Localização</p>

							<!-- CEP -->
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="cep sizefull s-text7 p-l-22 p-r-22" type="text" name="postal_code" id="postal_code" placeholder="CEP">
							</div>

							<!-- Rua -->
							<div class="bo4 of-hidden size15 m-b-20">
								
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="street" id="street" placeholder="Rua">
								
							</div>

							<!-- Número -->
							<div class="bo4 of-hidden size15 m-b-20">
								
								<input required class="number sizefull s-text7 p-l-22 p-r-22" type="text" name="street_number" id="street_number" placeholder="Número">
								
							</div>

							<!-- Bairro -->
							<div class="bo4 of-hidden size15 m-b-20">
								
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="neighborhood" id="neighborhood" placeholder="Bairro">
								
							</div>

							<!-- Cidade -->
							<div class="bo4 of-hidden size15 m-b-20">
								
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="city" id="city" placeholder="Cidade">
								
							</div>

							<!-- Estado -->
							<div class="bo4 of-hidden size15 m-b-20">
								
								<select class="sizefull s-text7 p-l-22 p-r-22" name="state" id="state">
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
								<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="complement" id="complement" placeholder="Complemento">
							</div>

							<!--Submit Button -->
							<div class="w-size25">
								<input class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="button" name="btn" value="Gravar" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-default" />
									
								</button>
							</div>
							
								<!-- Modal Confirm Form -->
								<div class="modal fade" id="confirm-submit" tabindex="-10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												Checkar Fornecedor
											</div>
											<div class="modal-body">
												Corfirme que todos os dados estão corretos.
												<table class="table">
													<tr>
														<th>Nome:</th>
														<td id="mName"></td>
													</tr>
													<tr>
														<th>CNPJ:</th>
														<td id="mCNPJ"></td>
													</tr>
													<tr>
														<th>Telefone Celular:</th>
														<td id="mPhoneNumber"></td>
													</tr>
													<tr>
														<th>Telefone:</th>
														<td id="mTelephone"></td>
													</tr>
													<tr>
														<th>Email:</th>
														<td id="mEmail"></td>
													</tr>
												
												</table>
												Localização
												<table class="table">
													<tr>
														<th>CEP:</th>
														<td id="mCEP"></td>
													</tr>
													<tr>
														<th>Rua:</th>
														<td id="mRua"></td>
													</tr>
													<tr>
														<th>Número:</th>
														<td id="mNumero"></td>
													</tr>
													<tr>
														<th>Bairro:</th>
														<td id="mBairro"></td>
													</tr>												
													<tr>
														<th>Cidade:</th>
														<td id="mCidade"></td>
													</tr>												
													<tr>
														<th>Estado:</th>
														<td id="mEstado"></td>
													</tr>												
													<tr>
														<th>Complemento:</th>
														<td id="mComplemento"></td>
													</tr>												
												</table>
											
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Editar</button>
												<a href="#" id="submit" class="btn btn-success success">Confirmar</a>
											</div>										
										</div>
									</div>
								</div>
								<!-- End Modal -->
						</form>
					</div>
				</div>
			</div>
		</section>

	@endsection