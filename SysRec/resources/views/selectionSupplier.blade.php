@extends('layouts.app')
@section('conteudo')
<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-8 p-b-30">
				<form id="formfield" class="leave-comment" method="POST" action="">
					@csrf
					<h4 class="m-text26 p-b-36 p-t-15">
						Edição de Fornecedores
					</h4>

					<!-- Products -->
					<p>Selecione a Fornecedores</p>
					<div class="bo4 of-hidden size15 m-b-20">
						<select class="sizefull s-text7 p-l-22 p-r-22" name='category_id' id="supplier_id">
							<option value="" selected disabled hidden>Selecione um Fornecedor </option>
							@foreach($supplier as $r)
							<option value="{{$r->value('id')}}">{{$r->value('name')}}</option>
							@endforeach
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
						url:"/selecionarFornecedorParaEdicao/Fornecedor/" + document.getElementById('supplier_id').value,
						type:'GET'
					}).done(function(msg){
						$("#supplier").html(msg);
					});
				});
			});
		</script>
		<div id="supplier">
		</div>
	</div>
</section>
@endsection