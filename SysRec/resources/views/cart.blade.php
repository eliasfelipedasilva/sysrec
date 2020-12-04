@extends('layouts.app')
@section('conteudo')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
	<div class="sec-title p-b-60">
		<h3 class="m-text5 t-center">
			Related Products
		</h3>
	</div>
	<div class="container">
		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">
				@if(!empty($dataRel))
				@foreach($dataRel as $r)
				<div class="item-slick2 p-l-15 p-r-15">
					<div class="block2">
						<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
							<img src="{{ $r->value('file') }}" alt="IMG-PRODUCT">

							<div class="block2-overlay trans-0-4">
								<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
									<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
									<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
								</a>

								<div class="block2-btn-addcart w-size1 trans-0-4">
									<!-- Button -->
									<a href="{{ route ('cartId', $r->value('id')) }}" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
										Add to Cart
									</a>
								</div>
							</div>
						</div>

						<div class="block2-txt p-t-20">
							<a href="{{route ('produtoDetalhe', $r->value('id')) }}" class="block2-name dis-block s-text3 p-b-5">
								{{ $r->value('name') }}
							</a>

							<span class="block2-price m-text6 p-r-5">
								R$ {{ $r->value('price') }}
							</span>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Cart item -->
		<div class="container-table-cart pos-relative">
			<div class="wrap-table-shopping-cart bgwhite">
				<table class="table-shopping-cart">
					<tr class="table-head">
						<th class="column-1"></th>
						<th class="column-2">Produtos</th>
						<th class="column-3">Preços</th>
						<th class="column-4 p-l-70">Quantidade</th>
						<th class="column-5">Total</th>
					</tr>
					@if(!empty($data))
					@foreach($data as $r)
					<tr class="table-row">
						<td class="column-1">
							<div class="cart-img-product b-rad-4 o-f-hidden">
								<img src="{{ $r->value('file') }}" alt="IMG-PRODUCT">
							</div>
						</td>
						<td class="column-2">{{ $r->value('name') }}</td>
						<td class="column-3"><input style="background-color:transparent;" id="precoUni{{$r->value('idP')}}" name="precoUni" type="number" disabled value="{{ number_format($r->value('price'), 2) }}"></td>
						<td class="column-4" align="center">
							<div class="flex-w bo5 of-hidden w-size17">
								<button id="menos{{ $r->value('idP')}}" onclick="menos('<?php echo ($r->value('idP')); ?>')" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 monitora">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" id="qtd{{ $r->value('idP')}}" type="number" name="num-product1" value="1">

								<button id="mais{{ $r->value('idP')}}" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 monitora" onclick="soma('<?php echo ($r->value('idP')); ?>')">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>
							<a href="{{route ('cartExcluir', $r->value('idOrder')) }}">Excluir</a>
						</td>
						<td class="column-5"><input style="background-color:transparent;" id="totProod{{ $r->value('idP') }}" type="number" class="totProd" disabled value="{{ number_format($r->value('price'), 2) }}"></td>
					</tr>
					@endforeach
					@else
					<tr class="table-row">
						<td colspan="5" align="center">
							Não existe produtos
						</td>
					</tr>
					@endif
				</table>
			</div>
		</div>

		<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
			<div class="flex-w flex-m w-full-sm">
				<div class="size11 bo4 m-r-10">
					<input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="descontoPerc" value="" name="coupon-code" placeholder="Coupon Code">
				</div>

				<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" onclick="desconto()">
						Apply coupon
					</button>
				</div>
			</div>

		</div>

		<!-- Total -->
		<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
			<h5 class="m-text20 p-b-24">
				Cart Totals
			</h5>

			<!--  -->
			<div class="flex-w flex-sb-m p-b-12">
				<span class="s-text18 w-size19 w-full-sm">
					Desconto:
				</span>

				<span class="m-text21 w-size20 w-full-sm">
					<input style="background-color:transparent;" id="desconto" type="number" disabled value="">
				</span>
			</div>

			<!--  -->
			<div class="flex-w flex-sb-m p-b-12">
				<span class="s-text18 w-size19 w-full-sm">
					Subtotal:
				</span>
				<span class="m-text21 w-size20 w-full-sm">
					<input style="background-color:transparent;" class="total" id="subTot" type="number" disabled value="">
				</span>
			</div>

			<!--  -->
			<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
				<span class="s-text18 w-size19 w-full-sm">
					Shipping:
				</span>

				<div class="w-size20 w-full-sm">
					<p class="s-text8 p-b-23">
						There are no shipping methods available. Please double check your address, or contact us if you need any help.
					</p>

					<span class="s-text19">
						Calculate Shipping
					</span>

					<div class="size13 bo4 m-b-22">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" id="cep" name="postcode" placeholder="Postcode / Zip">
					</div>

					<div id="retorno">

					</div>
					<div class="size14 trans-0-4 m-b-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 monitora" id="freteValor" onclick="calculo()">
							Pesquisar
						</button>
					</div>
				</div>
			</div>

			<!--  -->
			<div class="flex-w flex-sb-m p-t-26 p-b-30">
				<span class="m-text22 w-size19 w-full-sm">
					Total:
				</span>

				<span class="m-text21 w-size20 w-full-sm">
					<input style="background-color:transparent;" id="total" type="text" disabled value>
				</span>
			</div>

			<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
				<!-- Button -->
				<a href="{{route ('finalSale') }}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
					Finalizar
				</a>
			</div>
		</div>
	</div>
</section>
<script>
	sum = 0;
	tam = 0;
	array = document.getElementsByClassName('totProd');
	tam = (array.length / 2);
	while (tam <= (array.length - 1)) {
		sum += parseFloat(array[tam].value);
		tam += 1;

	}
	subTot = document.getElementById("subTot").value = sum.toFixed(2);
	document.getElementById("total").value = sum.toFixed(2);

	function soma(id) {
		sum = 0;
		tam = 0;
		var qtdAtual = document.getElementById("qtd".concat(id));
		let precoUni = document.getElementById("precoUni".concat(id));
		var totProod = document.getElementById("totProod".concat(id));
		totProod.value = (precoUni.value * (parseInt(qtdAtual.value) + 1)).toFixed(2);
		array = document.getElementsByClassName('totProd');
		tam = (array.length / 2);
		while (tam <= (array.length - 1)) {
			sum += parseFloat(array[tam].value);
			tam += 1;

		}
		subTot = document.getElementById("subTot").value = sum.toFixed(2);
	}

	function menos(id) {
		sum = 0;
		tam = 0;
		var qtdAtual = document.getElementById("qtd".concat(id));
		let precoUni = document.getElementById("precoUni".concat(id));
		var totProod = document.getElementById("totProod".concat(id));
		if (qtdAtual.value > 1) {
			totProod.value = (precoUni.value * (parseInt(qtdAtual.value) - 1)).toFixed(2);
		}
		array = document.getElementsByClassName('totProd');
		tam = (array.length / 2);
		while (tam <= (array.length - 1)) {
			sum += parseFloat(array[tam].value);
			tam += 1;

		}
		subTot = document.getElementById("subTot").value = sum.toFixed(2);
	}

	function desconto() {
		var subTot = document.getElementById("subTot")
		valorAnterior = subTot.value;
		//document.getElementById("subTot").value = (subTot.value) * (1 - (parseInt(document.getElementById("descontoPerc").value) / 100));
		document.getElementById("subTot").value = ((subTot.value) * (1 - (10) / 100)).toFixed(2);
		document.getElementById("desconto").value = (valorAnterior - (document.getElementById("subTot").value)).toFixed(2);
	}

	function calculo() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var cep = $("#cep").val();
		var url = "/frete/" + cep;
		$.ajax({
				url: url,
				type: 'GET',
				data: {
					cep: cep
				}
			})
			.done(function(msg) {
				$("#retorno").html(msg);
				document.getElementById("freteValor").click();
			});
	}

	$(document).ready(function (){
		$(".monitora").click(function (){
			sum = 0;
			$(".total").each(function(){
				sum += parseFloat($(this).val());
			});
			document.getElementById("total").value = sum.toFixed(2);
		});
	});

	function alerta(){
		swal('Aguarde');
	}
</script>
@endsection