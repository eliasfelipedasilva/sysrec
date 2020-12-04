@extends('layouts.app')
@section('conteudo')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>  
<script type="text/javascript" src="{{ URL::asset('js/category-register.js') }}"></script>
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
				'Nova categoria cadastrada!',
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
			text: 'Categoria já existe!'
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
					<form id="formfield" class="leave-comment" method="POST" action="{{ route('categoryRegister') }}">
					@csrf
						<h4 class="m-text26 p-b-36 p-t-15">
							Cadastrar Categoria
						</h4>
						<!-- Nome -->
						<p>Nome</p>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" id="name" placeholder="Insira um nome de uma nova categoria" maxlength="35">
							
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
										Checkar Categoria
									</div>
									<div class="modal-body">
										Corfirme que todos os dados estão corretos.
										<table class="table">
											<tr>
												<th>Nome:</th>
												<td id="mName"></td>
											</tr>
											<tr>
												<th>Usuário:</th>
												<td><?php echo userSession()?></td>
											</tr>
											<tr>
												<th>Data:</th>
												<td><?php echo date('d/m/y')?></td>
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