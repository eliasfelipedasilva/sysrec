<!DOCTYPE html>
<html lang="en">

<head>
	<title>Loja - Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="/images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/themify/themify-icons.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/elegant-font/html-css/style.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/lightbox2/css/lightbox.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/table.css">
	<link rel="stylesheet" type="text/css" href="/css/estrelas.css">
	<!--==Produtos=====================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/noui/nouislider.min.css">
	<!--==ProdutosDetalhes=============================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/slick/slick.css">
	<!--==Sweet Alert =================================================================================-->
	<script type="text/javascript" src="/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript" src="/js/jquery.mask.js"></script>
	<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body class="animsition">
	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					Desconto de 7% em compras acima de R$ 100,00
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						loja@tcc.com
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="{{ route('home') }}" class="logo">
					<img src="/images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="">Categorias</a>				
								<ul class="sub_menu">
									<?php echo getCategoryList(); ?>
								</ul>
							</li>

							<li>
								<a href="{{ route('produto') }}">Produtos</a>
							</li>

							<li>
								<a href="{{ route('about') }}">Sobre</a>
							</li>

							<li>
								<a href="{{ route('contact') }}">Contato</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class=" header-icons">

					<div class="header-wrapicon2">
						<img src="/images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="{{ route('clientPanel') }}" class="flex-c-m size1 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
									Meu Perfil
								</a>
								<a href="{{ route('consultSale') }}" class="flex-c-m size1 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
									Meus Pedidos
								</a>
							</div>
						</div>
					</div>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								@if(isset($data))
								@foreach($data as $r)
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="{{ $r->value('file') }}">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											{{$r->value('name')}}
										</a>

										<span class="header-cart-item-info">
											<input style="background-color:transparent;" type="number" class="totProd" disabled value="{{ $r->value('price') }}">
										</span>
									</div>
								</li>
								@endforeach
								@endif
							</ul>

							<div class="header-cart-total">
								<input style="background-color:transparent;" type="number" id="totCart" disabled value="">
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('cart') }}" class="flex-c-m size1 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
										Ver carrinho
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route ('finalSale')}}" class="flex-c-m size1 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
										Finalizar
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="{{ route('home') }}" class="logo-mobile">
				<img src="/images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti" value=""></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								@if(isset($data))
								@foreach($data as $r)
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="{{ $r->value('file') }}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											{{$r->value('name')}}
										</a>

										<span class="header-cart-item-info">
											{{$r->value('price')}}
										</span>
									</div>
								</li>
								@endforeach
								@endif
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route('cart') }}" class="flex-c-m size1 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
										Ver Carrinho
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ route ('finalSale')}}" class="flex-c-m size1 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
										Finalizar
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu">
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Desconto de 7% em compras acima de R$ 100,00
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								loja@tcc.com
							</span>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="{{ route('home') }}">Categorias</a>
						<ul class="sub-menu">
							<li><a href="index.html">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="{{ route('produto') }}">Produtos</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{{ route('home') }}">Ofertas</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{{ route('about') }}">Sobre</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{{ route('contact') }}">Contato</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<script>
		var elementos = document.getElementsByClassName("header-cart-item");
		$(".header-icons-noti").text('' + elementos.length / 2);

		var sum = 0;
		$(".totProd").each(function() {
			if (!isNaN(this.value) && this.value.length != 0) {
				sum += parseFloat(this.value);
			}
		})
		$("#totCart").val(sum);
	</script>