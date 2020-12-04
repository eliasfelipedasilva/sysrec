@extends('layouts.app')
@section('conteudo')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>

<body class="animsition">
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<!-- eu tirei o layout de tabela -->
			<div class="divTable">
				<div class="divTableBody">
					<!-- mostra o cabeçalho do pedido -->
					<div class="divTableRow">
						<div class="divTableCell">Numero do Pedido</div>
						<div class="divTableCell">Data do Pedido</div>
						<div class="divTableCell">Valor Total</div>
						<div class="divTableCell">Teste</div>
					</div>
					@if(!empty($dataOrder))
					@foreach($dataOrder as $r)
					<div class="divTableRow">
						<div class="divTableCell">{{$r->value('idOrder')}}</div>
						<div class="divTableCell">{{$r->value('dateOrder')}}</div>
						<div class="divTableCell">{{$r->value('totalOrder')}}</div>
						<div class="divTableCell">
							<!-- botão com a ID concatenada com o numero do pedido, o ID deve ser unico, não pode se repetir -->
							<button id="btn_detalhes_pedido_{{$r->value('idOrder')}}" onclick="exibir({{$r->value('idOrder')}})">Exibir Detalhes</button>
						</div>
						<!-- esssa div mostrará os detalhes do pedido, ela inicia fechada dislay none -->
						<div id="visulUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="visulUsuarioModalLabel">Detalhes do Pedido</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<span id="visul_usuario"></span>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@else
					Nâo existe Pedido
					@endif
				</div>
			</div>
		</div>
	</section>
</body>
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	function exibir(id) {
		var idD = "#div_detalhes_pedido_" + id;
		var url = "/consultaAjax/" + id;
		$.ajax({
				url: url,
				type: 'GET',
				data: {
					nome: id
				}
			})
			.done(function(msg) {
				$("#visul_usuario").html(msg);
				$('#visulUsuarioModal').modal('show');
			});

	}
</script>
@endsection