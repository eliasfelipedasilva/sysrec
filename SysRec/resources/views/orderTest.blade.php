<table>
    <thead class="thead-dark">
        <tr>
            <th scope="col">Produto</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor Unitario</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $r)
        <tr>
            <td>
                <div class="cart-img-product b-rad-4 o-f-hidden">
                    <img src="{{ $r->value('file') }}" alt="IMG-PRODUCT">
                </div>
            </td>
            <td>{{ $r->value('name')}}</td>
            <td><input style="background-color:transparent;" type="number" class="totProd" disabled value="{{$r->value('price')}}"></td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="flex-w flex-sb-m p-b-12">
				<span class="s-text18 w-size19 w-full-sm">
					Total:
				</span>

				<span class="m-text21 w-size20 w-full-sm">
					<input style="background-color:transparent;" id="subTot" type="number" disabled value="">
				</span>
			</div>

<script>
    sum = 0;
    $(".totProd").each(function() {
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value);
        }
    })
    $("#subTot").val(sum);
</script>