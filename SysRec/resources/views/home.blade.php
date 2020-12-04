@extends('layouts.app')
@section('conteudo')

	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(images/b1.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Novos Smartphones em Oferta!
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							Entrega para todo Brasil!
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Frete Grátis!
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(images/b2.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Tudo em oferta!
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							Smartphones
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Veja agora!
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(images/b3.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Novos Smartphones em Oferta!
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							Frete Grátis!
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Veja agora!
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Banner -->
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
					<!-- Product -->
					<div class="row">

						<!-- Block2 -->
					
						@foreach($dataRecom as $r)
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
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
									<a href="{{ route('produtoDetalhe', $r->value('id')) }}" class="block2-name dis-block s-text3 p-b-5">
										{{$r->value("name")}}
									</a>

									<span class="block2-price m-text6 p-r-5">
										R$ {{ $r->value('price')}}
									</span>
								</div>
							</div>
						</div>
						@endforeach
					</div>
		</div>
	</section>
@endsection