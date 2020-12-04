<!-- Footer -->
<footer class="bg6	 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					ENTRAR EM CONTATO
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Algum problema? Encontre-nos na Av. Vitalina Marcusso, 1400 - Campus Universitario, Ourinhos - SP, 19910-206
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categorias
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Informatica
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Jogos
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="{{route ('about')}}" class="s-text7">
							Sobre 
						</a>
					</li>

					<li class="p-b-9">
						<a href="{{route ('contact')}}" class="s-text7">
							Contato
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Ajuda
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Rastrear Pedido
						</a>
					</li>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Mantenha-se atualizado!
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="meuemail@provedor.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-5 hov1 m-text3 trans-0-4">
							Assinar!
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="/images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="/images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="/images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="/images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="/images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2019 Todos os direitos reservados. Feito com <i class="fa fa-heart-o" aria-hidden="true"></i> por alunos da <a href="https://colorlib.com" target="_blank">Fatec Ourinhos</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>


<!--===============================================================================================-->
	<script type="text/javascript" src="/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>



<!--===============================================================================================-->
	<script type="text/javascript" src="/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>


	<!--===============================================================================================-->
	<script type="text/javascript" src="/vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
			/*[ No ui ]
			===========================================================*/
			var filterBar = document.getElementById('filter-bar');

			noUiSlider.create(filterBar, {
				start: [ 50, 200 ],
				connect: true,
				range: {
					'min': 50,
					'max': 200
				}
			});

			var skipValues = [
			document.getElementById('value-lower'),
			document.getElementById('value-upper')
			];

			filterBar.noUiSlider.on('update', function( values, handle ) {
				skipValues[handle].innerHTML = Math.round(values[handle]) ;
			});
	</script>
<!--===============================================================================================-->
	<script src="/js/main.js"></script>

</body>
</html>
