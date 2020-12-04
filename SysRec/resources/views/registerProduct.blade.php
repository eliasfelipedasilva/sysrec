@extends('layouts.app')
@section('conteudo')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>           
<script type="text/javascript" src="{{ URL::asset('js/jquery.mask.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/product-register.js') }}"></script>


	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
			<div class="container">
				<div class="row">
					<div class="col-md-6 p-b-30">
						<form id="formfield" class="leave-comment" method="POST" action="{{ route('productRegister') }}" enctype="multipart/form-data">
						@csrf
							<h4 class="m-text26 p-b-36 p-t-15">
								Registro de Produto
							</h4>	
							<!-- Nome -->
							<p>Nome</p>
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" id="name" maxlength = 60 name="name" placeholder="Nome">
                            </div>

							<!-- Category -->
							<p>Categoria</p>
							<div class="bo4 of-hidden size15 m-b-20">
								<select  class="sizefull s-text7 p-l-22 p-r-22" name='category_id' id ="category">
									<option value="" selected disabled hidden>Selecione uma categoria</option>
									<?php echo $strCat."\n" ?>                              
								</select>
							</div>

							<!-- Supllier -->							
							<p>Fornecedor</p>
							<div class="bo4 of-hidden size15 m-b-20">
								<select  class="sizefull s-text7 p-l-22 p-r-22" name='supplier_id' id="supplier">
									<option value="" selected disabled hidden>Selecione um fornecedor</option>
									<?php echo $strSup."\n" ?>                              
								</select>
							</div>

							<!-- Costs Price -->
							<p>Valor de Custo</p>
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="money sizefull s-text7 p-l-22 p-r-22" maxlength = 7 type="text" name ="costs_price" placeholder="Valor do produto" id="costsprice">
							</div>

							<!-- Sales Price -->
							<p>Valor de Venda</p>
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="money sizefull s-text7 p-l-22 p-r-22" maxlength = 8 type="text" name ="sales_price" placeholder="Valor do produto" id="salesprice">
							</div>
							
							<!-- Product Desc -->
							<p>Descrição do Produto</p>
							<div class="bo4 of-hidden size20 m-b-20">
								<textarea class="sizefull s-text7 p-l-22 p-r-22" name="describ" rows="5" cols="33" id="productdesc">
								</textarea>
							</div>
							
							<h4 class="m-text26 p-b-36 p-t-15">
								Dimensões
							</h4>

							<!-- Height -->
							<p>Altura</p>
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="number sizefull s-text7 p-l-22 p-r-22" type="text" name ="height" placeholder="Altura (cm)" id="height" maxlength="5">	
							</div>

							<!-- Width -->
							<p>Largura</p>
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="number sizefull s-text7 p-l-22 p-r-22" type="text" name ="width" placeholder="Largura (cm)" id="width" maxlength="5">		
							</div>

							<!-- Depth -->
							<p>Profundidade</p>
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="number sizefull s-text7 p-l-22 p-r-22" type="text" name ="depth" placeholder="Profundidade (cm)" id="depth" maxlength="5">		
							</div>

							<!-- Wight -->
							<p>Peso</p>
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="number sizefull s-text7 p-l-22 p-r-22" type="text" name ="weight" placeholder="Peso (g)" id="weight" maxlength="5">		
							</div>

							<!-- SAC Phone -->
							<p>Ajuda</p>
							<div class="bo4 of-hidden size15 m-b-20">
								<input required class="sp_celphones sizefull s-text7 p-l-22 p-r-22" type="text" name ="sac" placeholder="Telefone SAC" id="sac">		
							</div>
							<!--Imagem -->
							<div class="bo4 of-hidden size18 m-b-20">
							{{ csrf_field() }}
							   <input type='file' id="primaryImage"  name="primaryImage" accept="image/*" />
							
							 
							</div>

							
							<!-- Submit Button -->		
							<div class="w-size25">
								<input class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="button" name="btn" value="Gravar" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-default" />
							</div>
							
							<!-- Modal Confirm Form -->
							<div class="modal fade" id="confirm-submit" tabindex="-10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											Checkar Produto
										</div>
										<div class="modal-body">
											Corfirme que todos os dados estão corretos.
											<table class="table">
												<tr>
													<th>Nome:</th>
													<td id="mName"></td>
												</tr>
												<tr>
													<th>Categoria:</th>
													<td id="mCategory"></td>
												</tr>
												<tr>
													<th>Fornecedor:</th>
													<td id="mSupplier"></td>
												</tr>
												<tr>
													<th>Valor de Custo:</th>
													<td id="mCostsPrice"></td>
												</tr>
												<tr>
													<th>Valor de Venda:</th>
													<td id="mSalesPrice"></td>
												</tr>
												<tr>
													<th>Descrição:</th>
													<td id="mProductDesc"></td>
												</tr>
											</table>
											Dimensões
											<table class="table">
												<tr>
													<th>Altura:</th>
													<td id="mHeight"></td>
												</tr>
												<tr>
													<th>Largura:</th>
													<td id="mWidth"></td>
												</tr>
												<tr>
													<th>Profundidade:</th>
													<td id="mDepth"></td>
												</tr>
												<tr>
													<th>Peso:</th>
													<td id="mWeight"></td>
												</tr>												
											</table>
											Ajuda
											<table class="table">
												<tr>
													<th>SAC:</th>
													<td id="mSac"></td>
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

    