@switch($type)
@case("filterProduct"):
<select class="sizefull s-text7 p-l-22 p-r-22" name='product_id' id="product">
	@foreach($product as $r)
	<option value="{{$r->value('id')}}">{{$r->value('name')}}</option>
	@endforeach
</select>
@break
@case("findProduct")
<div class="row">
	<div class="col-md-6 p-b-30">
		<form id="formfield" class="leave-comment" method="POST" action="{{ route('productUpdate') }}" enctype="multipart/form-data">
			<input type="hidden" name="idProduct" value="{{$product->value('id')}}">
			@csrf
			<h4 class="m-text26 p-b-36 p-t-15">
				Dados do Produto
			</h4>
			<!-- Nome -->
			<p>Nome</p>
			<div class="bo4 of-hidden size15 m-b-20">
				<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" id="name" value="{{$product->value('name')}}" maxlength=60 name="name" placeholder="Nome">
			</div>

			<!-- Category -->
			<p>Categoria</p>
			<div class="bo4 of-hidden size15 m-b-20">
				<select class="sizefull s-text7 p-l-22 p-r-22" name='category_id' id="category">
					@foreach($category as $r)
					<option value="{{$r->value('id')}}" <?php if ($r->value('id') == $product->value('catId')) {
															echo ("selected");
														} ?>>{{$r->value('name')}}</option>
					@endforeach
				</select>
			</div>

			<!-- Supllier -->
			<p>Fornecedor</p>
			<div class="bo4 of-hidden size15 m-b-20">
				<select class="sizefull s-text7 p-l-22 p-r-22" name='supplier_id' id="supplier">
					@foreach($supplier as $r)
					<option value="{{$r->value('id')}}" <?php if ($r->value('id') == $product->value('supId')) {
															echo ("selected");
														} ?>>{{$r->value('name')}}</option>
					@endforeach
				</select>
			</div>

			<!-- Costs Price -->
			<p>Valor de Custo</p>
			<div class="bo4 of-hidden size15 m-b-20">
				<input required class="money sizefull s-text7 p-l-22 p-r-22" value="{{$product->value('costs_price')}}" maxlength=7 type="text" name="costs_price" placeholder="Valor do produto" id="costsprice">
			</div>

			<!-- Sales Price -->
			<p>Valor de Venda</p>
			<div class="bo4 of-hidden size15 m-b-20">
				<input required class="money sizefull s-text7 p-l-22 p-r-22" value="{{$product->value('price')}}" maxlength=8 type="text" name="sales_price" placeholder="Valor do produto" id="salesprice">
			</div>

			<!-- Product Desc -->
			<p>Descrição do Produto</p>
			<div class="bo4 of-hidden size20 m-b-20">
				<textarea class="sizefull s-text7 p-l-22 p-r-22" name="describ" rows="5" cols="33" id="productdesc">{{$product->value('describ')}}
				</textarea>
			</div>

			<h4 class="m-text26 p-b-36 p-t-15">
				Dimensões
			</h4>

			<!-- Height -->
			<p>Altura</p>
			<div class="bo4 of-hidden size15 m-b-20">
				<input required class="number sizefull s-text7 p-l-22 p-r-22" value="{{$product->value('height')}}" type="text" name="height" placeholder="Altura (cm)" id="height" maxlength="5">
			</div>

			<!-- Width -->
			<p>Largura</p>
			<div class="bo4 of-hidden size15 m-b-20">
				<input required class="number sizefull s-text7 p-l-22 p-r-22" value="{{$product->value('width')}}" type="text" name="width" placeholder="Largura (cm)" id="width" maxlength="5">
			</div>

			<!-- Depth -->
			<p>Profundidade</p>
			<div class="bo4 of-hidden size15 m-b-20">
				<input required class="number sizefull s-text7 p-l-22 p-r-22" value="{{$product->value('depth')}}" type="text" name="depth" placeholder="Profundidade (cm)" id="depth" maxlength="5">
			</div>

			<!-- Wight -->
			<p>Peso</p>
			<div class="bo4 of-hidden size15 m-b-20">
				<input required class="number sizefull s-text7 p-l-22 p-r-22" value="{{$product->value('weight')}}" type="text" name="weight" placeholder="Peso (g)" id="weight" maxlength="5">
			</div>

			<!-- SAC Phone -->
			<p>Ajuda</p>
			<div class="bo4 of-hidden size15 m-b-20">
				<input required class="sp_celphones sizefull s-text7 p-l-22 p-r-22" value="{{$product->value('sac')}}" type="text" name="sac" placeholder="Telefone SAC" id="sac">
			</div>
			<!--Imagem -->
			<div class="bo4 of-hidden size18 m-b-20">
				<img class="img-thumbnail" src="{{$product->value('file')}}" />
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Upload</span>
				</div>
				<div class="custom-file">
					<input type="file" name="primaryImage" value ="{{$product->value('file')}}" class="custom-file-input" id="inputGroupFile01">
					<label class="custom-file-label" for="inputGroupFile01">Escolha o arquivo</label>
				</div>
			</div>
			<input type="hidden" name="arquivo" value ="{{$product->value('file')}}">

			<!-- Submit Button -->
			<div class="w-size25">
				<input class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="btn" value="Atualizar" id="submitBtn"class="btn btn-default" />
			</div>
		</form>
	</div>
</div>
@break
@endswitch