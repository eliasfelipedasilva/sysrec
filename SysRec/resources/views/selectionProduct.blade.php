@extends('layouts.app')
@section('conteudo')
<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-8 p-b-30">
				<form id="formfield" class="leave-comment" method="POST" action="{{ route('productEdit') }}">
					@csrf
					<h4 class="m-text26 p-b-36 p-t-15">
						Edição de Produto
					</h4>

					<script>
						$(document).ready(function() {
						$("#category").change(function() {
							$.ajax({
									url: "/selecionarProdutoParaEdicao/categoria/" + document.getElementById('category').value,
									type: 'GET',
									data: {
										category: document.getElementById('category').value
									}
								})
								.done(function(msg) {
									$("#product").html(msg);
								});
							});
						});
					</script>

					<!-- Products -->
					<p>Selecione a categoria do Produto</p>
					<div class="bo4 of-hidden size15 m-b-20">
						<select class="sizefull s-text7 p-l-22 p-r-22" name='category_id' id="category">
							<option value="" selected disabled hidden>Selecione uma categoria </option>
							@foreach($category as $r)
							<option value="{{$r->value('id')}}">{{$r->value('name')}}</option>
							@endforeach
						</select>
					</div>

					<!-- Products -->
					<p>Selecione o produto que deseja alterar</p>
					<div class="bo4 of-hidden size15 m-b-20">
						<select class="sizefull s-text7 p-l-22 p-r-22" name='product_id' id="product">
							<option value="" selected disabled hidden>Selecione um Produto</option>
						</select>
					</div>

					<!-- Submit Button -->
					<div class="w-size25">
						<input class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="button" id='consultar' value='Consultar' name="btn"/>
					</div>

				</form>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				$("#consultar").click(function(){
					$.ajax({
						url:"/selecionarProdutoParaEdicao/produto/"+ document.getElementById('product').value,
						type:'GET',
						data: {
							id_produto: document.getElementById('product').value
						}
					}).done(function(msg){
						$("#produto").html(msg);
					});
				});
			});
		</script>
		<div id="produto">
		</div>
	</div>
</section>
@endsection