jQuery(function ($) {


	/* ----------------------------------------------------------- */
	/*  1. CARTBOX
	/* ----------------------------------------------------------- */

	jQuery(".aa-cartbox").hover(function () {
		jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
	}
		, function () {
			jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
		}
	);

	/* ----------------------------------------------------------- */
	/*  2. TOOLTIP
	/* ----------------------------------------------------------- */
	jQuery('[data-toggle="tooltip"]').tooltip();
	jQuery('[data-toggle2="tooltip"]').tooltip();

	/* ----------------------------------------------------------- */
	/*  3. PRODUCT VIEW SLIDER
	/* ----------------------------------------------------------- */

	jQuery('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
		loading_image: '/assets/img/loading.gif'
	});

	jQuery('#demo-1 .simpleLens-big-image').simpleLens({
		loading_image: '/assets/img/loading.gif'
	});

	/* ----------------------------------------------------------- */
	/*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
	/* ----------------------------------------------------------- */

	jQuery('.aa-popular-slider').slick({
		dots: false,
		infinite: false,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});


	/* ----------------------------------------------------------- */
	/*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
	/* ----------------------------------------------------------- */

	jQuery('.aa-featured-slider').slick({
		dots: false,
		infinite: false,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});

	/* ----------------------------------------------------------- */
	/*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
	/* ----------------------------------------------------------- */
	jQuery('.aa-latest-slider').slick({
		dots: false,
		infinite: false,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});

	/* ----------------------------------------------------------- */
	/*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
	/* ----------------------------------------------------------- */

	jQuery('.aa-testimonial-slider').slick({
		dots: true,
		infinite: true,
		arrows: false,
		speed: 300,
		slidesToShow: 1,
		adaptiveHeight: true
	});

	/* ----------------------------------------------------------- */
	/*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
	/* ----------------------------------------------------------- */

	jQuery('.aa-client-brand-slider').slick({
		dots: false,
		infinite: false,
		speed: 300,
		autoplay: true,
		autoplaySpeed: 2000,
		slidesToShow: 5,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});

	/* ----------------------------------------------------------- */
	/*  9. PRICE SLIDER  (noUiSlider SLIDER)
	/* ----------------------------------------------------------- */

	jQuery(function () {
		if ($('body').is('.productPage')) {
			var skipSlider = document.getElementById('skipstep');
			noUiSlider.create(skipSlider, {
				range: {
					'min': 0,
					'10%': 10,
					'20%': 20,
					'30%': 30,
					'40%': 40,
					'50%': 50,
					'60%': 60,
					'70%': 70,
					'80%': 80,
					'90%': 90,
					'max': 100
				},
				snap: true,
				connect: true,
				start: [20, 70]
			});
			// for value print
			var skipValues = [
				document.getElementById('skip-value-lower'),
				document.getElementById('skip-value-upper')
			];

			skipSlider.noUiSlider.on('update', function (values, handle) {
				skipValues[handle].innerHTML = values[handle];
			});
		}
	});



	/* ----------------------------------------------------------- */
	/*  10. SCROLL TOP BUTTON
	/* ----------------------------------------------------------- */

	//Check to see if the window is top if not then display button

	jQuery(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});

	//Click event to scroll to top

	jQuery('.scrollToTop').click(function () {
		$('html, body').animate({ scrollTop: 0 }, 800);
		return false;
	});

	/* ----------------------------------------------------------- */
	/*  11. PRELOADER
	/* ----------------------------------------------------------- */

	jQuery(window).load(function () { // makes sure the whole site is loaded
		jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out
	})

	/* ----------------------------------------------------------- */
	/*  12. GRID AND LIST LAYOUT CHANGER
	/* ----------------------------------------------------------- */

	jQuery("#list-catg").click(function (e) {
		e.preventDefault(e);
		jQuery(".aa-product-catg").addClass("list");
	});
	jQuery("#grid-catg").click(function (e) {
		e.preventDefault(e);
		jQuery(".aa-product-catg").removeClass("list");
	});


	/* ----------------------------------------------------------- */
	/*  13. RELATED ITEM SLIDER (SLICK SLIDER)
	/* ----------------------------------------------------------- */

	jQuery('.aa-related-item-slider').slick({
		dots: false,
		infinite: false,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});


	/* ----------------------------------------------------------- */
	/*  14. LOGIN
	/* ----------------------------------------------------------- */

	$("#login").click(function () {
		const email = $($("input[name=email]")[0]).val();
		const password = $($("input[name=password]")[0]).val();
		$(this).attr("disabled", true)
		$("#register").attr("disabled", true)
		$("#wpf-loader-two").css("display", "block");
		$(".aa-register-now").html("¡Si! Inicia sesión o regístrate en el mismo formulario");
		$.ajax({
			type: "POST",
			url: "/api/login.php",
			data: {
				email,
				password
			},
			dataType: 'json'
		})
			.done(function (data) {
				console.log({ data })
				if (data.success) {
					location.reload()
					return;
				}
				$("#wpf-loader-two").css("display", "none");
				$(".aa-register-now").html(data.message)
				$("#login").removeAttr("disabled")
				$("#register").removeAttr("disabled")
			}).fail(function (err) {
				$("#wpf-loader-two").css("display", "none");
				console.log({
					err
				})
			})
	})

	/* ----------------------------------------------------------- */
	/*  14. REGISTER
	/* ----------------------------------------------------------- */

	$("#register").click(function () {
		const email = $($("input[name=email]")[0]).val();
		const password = $($("input[name=password]")[0]).val();
		$(this).attr("disabled", true)
		$("#login").attr("disabled", true)
		$("#wpf-loader-two").css("display", "block");
		$(".aa-register-now").html("¡Si! Inicia sesión o regístrate en el mismo formulario");
		$.ajax({
			type: "POST",
			url: "/api/register.php",
			data: {
				email,
				password
			},
			dataType: 'json'
		})
			.done(function (data) {
				console.log({ data2: data })
				if (data.success) {
					location.reload()
					return;
				}
				$(".aa-register-now").html(data.message)
				$("#register").removeAttr("disabled")
				$("#login").removeAttr("disabled")
				$("#wpf-loader-two").css("display", "none");
			}).fail(function (err) {
				$("#wpf-loader-two").css("display", "none");
				console.log({
					err
				})
			})
	})



	const addToCart = (id, quantity, done) => {
		$.ajax({
			type: "POST",
			url: "/api/cart.php",
			data: {
				id,
				quantity
			},
			dataType: 'json'
		})
			.done(done).fail(function (err) {
				console.log({
					err
				})
			})
	}


	/* ----------------------------------------------------------- */
	/*  15. ADD TO CART
	/* ----------------------------------------------------------- */
	$(".aa-add-to-cart-btn").add(".aa-add-card-btn").click(function () {
		const productid = $(this).attr("class").split(" ")[1]
		if (productid) {
			const id = productid.split("-")[1]
			if (id) {
				const quantity = $(this).parent().parent().find(`select[name=quantity-${id}] option`).filter(':selected').val() || 1
				if (quantity) {
					$("#wpf-loader-two").css("display", "block");
					addToCart(id, quantity, (data) => {
						const body = data.body
						if (data.success) {
							let lcart = body.cart.length
							$(".aa-cart-notify").html(lcart);
							let newhtml = ''
							let total = 0
							for (let index = 0; index < (lcart > 3 ? 3 : lcart); index++) {
								const item = body.cart[index];
								newhtml = `${newhtml}
								<li>
									<a class="aa-cartbox-img" href="#"><img src="${item.IMG_URL}" alt="img"></a>
									<div class="aa-cartbox-info">
									<h4><a href="#">${item.NOMBRE}</a></h4>
									<p>${item.CANTIDAD} x S./ ${item.PRECIO}</p>
									</div>
								</li>`;
								total += item.CANTIDAD * item.PRECIO;
							}
							if (lcart <= 3) {
								newhtml = `${newhtml}<li>
									<span class="aa-cartbox-total-title">
									Total
									</span>
									<span class="aa-cartbox-total-price">S./ ${total}</span>
								</li>`
							}
							if ($(".aa-cartbox-summary ul li").length === 1)
								$(".aa-cartbox-summary").append(`<a class="aa-cartbox-checkout aa-primary-btn" href="/index.php?page=cart" >Ver todo</a>`)

							$(".aa-cartbox-summary ul").html(newhtml)
							alert("Su producto fue guardado correctamente");
						} else {
							alert(data.message)
						}
						$("#wpf-loader-two").css("display", "none");
					})
					return;
				}
			}
		}
		alert("No se logró agregar al carrito.")
	})

	$(".aa-cart-quantity").bind('keyup mouseup', function () {
		const productid = $(this).attr("class").split(" ")[1]
		if (productid) {
			const id = productid.split("-")[1];
			if (id) {
				const quantity = $(this).val()
				$("#wpf-loader-two").css("display", "block");
				addToCart(id, quantity, (data) => {
					console.log({ data })
					location.reload();
				})
			}
		}
	});


	/* ----------------------------------------------------------- */
	/*  16. PAYPAL FORM
	/* ----------------------------------------------------------- */
	$("input[name=optionsRadios]").change(function () {
		if (this.value == 'paypal') {
			$(".paypal-form").css("display", "block")
		}
		else {
			$(".paypal-form").css("display", "none")
		}
	});

	/* ----------------------------------------------------------- */
	/*  17. PAY
	/* ----------------------------------------------------------- */
	$("#pay").click(function () {
		const data = {
			NOMBRE: $(".aa-checkout-billaddress input[name=name]").val(),
			NUM_DOCUMENTO: $(".aa-checkout-billaddress input[name=num_documento]").val(),
			EMAIL: $(".aa-checkout-billaddress input[name=email]").val(),
			CELULAR: $(".aa-checkout-billaddress input[name=phone]").val(),
			COMPROBANTE: $(".aa-checkout-billaddress [name=voucher] option").filter(':selected').val(),
			DIRECCION: $(".aa-checkout-billaddress textarea[name=address]").val(),
			TIPO_PAGO: $(".checkout-right input[name=optionsRadios]:checked").val(),
			TARJETA: $(".paypal-form input[name=card]").val(),
			MMAA: $(".paypal-form input[name=mmaa]").val(),
			CVV: $(".paypal-form input[name=cvv]").val(),
		}
		$("#wpf-loader-two").css("display", "block");
		$.ajax({
			type: "POST",
			url: "/api/payment.php",
			data,
			dataType: 'json'
		})
			.done(function (data) {
				$("#wpf-loader-two").css("display", "none");
				if (data.success) {
					alert("Su orden fue registrado correctamente.");
					window.location = "/";
				} else {
					alert(data.message);
				}
			})
			.fail(function (err) {
				console.log({
					err
				})
			})

	});

	/* ----------------------------------------------------------- */
	/*  18. REMOVE FROM CART
	/* ----------------------------------------------------------- */
	$(".remove").click(function () {
		const productid = $(this).attr("class").split(" ")[1];
		$("#wpf-loader-two").css("display", "block");
		if (productid) {
			const id = productid.split("-")[1];
			if (id) {
				addToCart(id, 0, (data) => {
					if (data.success) {
						window.location = "/index.php?page=cart";
					} else {
						$("#wpf-loader-two").css("display", "none");
						alert(data.mesage);
					}
				})
			}
		}
	})
});

