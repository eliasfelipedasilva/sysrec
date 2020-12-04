@extends('layouts.app')
@section('conteudo')
<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">

@if($valida == "comprou")
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
	<a href="{{ route('produtoDetalhe', $p->value('id')) }}">Voltar para detalhes do Produto</a>
</div>
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-6 p-b-30">
				@csrf
				<h4 class="m-text26 p-b-36 p-t-15">
					{{$p->value('name')}}
				</h4>

				<div class="wrap-pic-w">
					<img src="{{ $p->value('file') }}" alt="">
				</div>
			</div>

			<div class="col-md-6 p-b-30">
				<form id="formfield" class="leave-comment" method="POST" action="{{ route('resultadoAvaliacao') }}" enctype="multipart/form-data">
					@csrf
					<h4 class="m-text26 p-b-36 p-t-15">
						Avaliação do Produto
					</h4>

					<p>Sua avaliação para este Produto</p>
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="1" name="avaliacao">Ruim
						</label>
					</div>
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="2" name="avaliacao">Regular
						</label>
					</div>
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="3" name="avaliacao">Bom
						</label>
					</div>
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="4" name="avaliacao">Ótimo
						</label>
					</div>
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="5" name="avaliacao">Excelente
						</label>
					</div>

					<!-- Nome -->
					<p>Você Recomenda este Produto</p>
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="1" name="recomenda">Sim
						</label>
					</div>
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="0" name="recomenda">Não
						</label>
					</div>
					<p>Descreva sua Opinião sobre o Produto</p>
					<div class="bo4 of-hidden size20 m-b-20">
						<textarea class="sizefull s-text7 p-l-22 p-r-22" name="opiniao" rows="5" cols="33" id="opiniao">
								</textarea>
					</div>
					<input type="hidden" name="idProd" value="{{ $p->value('id') }}">
					<!-- Button -->
					<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
						Enviar
					</button>
				</form>
			</div>
		</div>

	</div>
@elseif($valida == "naoComprou")
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
	<a href="{{ route('produtoDetalhe', $p->value('id')) }}">Voltar para detalhes do Produto</a>
</div>
<div class="container">
	<h4 class="m-text26 p-b-36 p-t-15">Você não comprou este Produto.</h4>
</div>
@elseif($valida == "avaliado")
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
	<a href="{{ route('produtoDetalhe', $p->value('id')) }}">Voltar para detalhes do Produto</a>
</div>
<div class="container">
	<h4 class="m-text26 p-b-36 p-t-15">Você já Avaliou este Produto.</h4>
</div>
</section>
@endif
@endsection