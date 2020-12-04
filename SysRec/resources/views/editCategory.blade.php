<div class="row">
	<div class="col-md-6 p-b-30">
		<form id="formfield" class="leave-comment" method="POST" action="{{ route('categoryUpdate') }}" enctype="multipart/form-data">
			@csrf
			<h4 class="m-text26 p-b-36 p-t-15">
				Dados do Categoria
			</h4>
			<!-- Nome -->
			<input type='hidden' value="{{$category->value('id')}}" name='idCat'> 
			<p>Nome</p>
			<div class="bo4 of-hidden size15 m-b-20">
				<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" id="name" value="{{$category->value('name')}}" maxlength=60 name="name" placeholder="Nome">
			</div>

			<!-- Submit Button -->
			<div class="w-size25">
				<input class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="btn" value="Atualizar" id="submitBtn"class="btn btn-default" />
			</div>
		</form>
	</div>
</div>