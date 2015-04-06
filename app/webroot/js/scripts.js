$(function() {
	$('#UsuarioRut').Rut();
	var current_fs, next_fs, previous_fs;
	var left, opacity, scale;
	var animating;
	$(".next").click(function() {
		if ( $(this).hasClass('step1') ) {
			if ( validaTexto($("#UsuarioFirstName").val()) == false) {
				$('.error-form').empty().html("Debe ingresar su nombre.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			if ( validaTexto($("#UsuarioLastName").val()) == false) {
				$('.error-form').empty().html("Debe ingresar su apellido.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			if ( $.Rut.validar($("#UsuarioRut").val()) == false) {
				$('.error-form').empty().html("Debes ingresar o corregir su RUT.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			var p4ss = $("#UsuarioP4ss").val();
			if ( validaNotEmpty( p4ss.trim() ) == false) {
				$('.error-form').empty().html("Debe ingresar su contraseña.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			var p4ssr = $("#UsuarioP4ss2").val();
			if ( validaNotEmpty( p4ssr.trim() ) == false) {
				$('.error-form').empty().html("Debe repetir su contraseña.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			if ( p4ss !== p4ssr ) {
				$('.error-form').empty().html("Las contraseñas ingresadas no coinciden.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}
		};

		if ( $(this).hasClass('step2') ) {
			if ( validaTexto($("#UsuarioAddress").val()) == false) {
				$('.error-form').empty().html("Debe ingresar su dirección.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			if ( validaEmail($("#UsuarioMail").val()) == false) {
				$('.error-form').empty().html("Debe ingresar su email.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			if ( validaEmail($("#UsuarioMailr").val()) == false) {
				$('.error-form').empty().html("Debe repetir su email.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			if ( validaEmail($("#UsuarioMail").val()) !== validaEmail($("#UsuarioMailr").val()) ) {
				$('.error-form').empty().html("Los email ingresados no coinciden, favor revisar.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			if ( validaSelect($("#UsuarioRegionId").val()) == false) {
				$('.error-form').empty().html("Debes seleccionar su región.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			if ( validaSelect($("#UsuarioComunaId").val()) == false) {
				$('.error-form').empty().html("Debes seleccionar su comuna.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			if ( validaNumber($("#UsuarioCod").val()) == false) {
				$('.error-form').empty().html("Debe ingresar su código de teléfono.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			if ( validaPhone($("#UsuarioPhone").val()) == false) {
				$('.error-form').empty().html("Debe ingresar su teléfono.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}

			if ( validaPhone($("#UsuarioMobile").val()) == false) {
				$('.error-form').empty().html("Debe ingresar su celular.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;	
			}
		};

		if ( $(this).hasClass('step3') ) {
			var flagDoc = true;
			var flagId = true;
			$(".car_doc").each( function(indx){
				if ( validaSelect($(this).val()) == false ) {
					flagDoc = false;
				}
			} );

			$(".car_id").each( function(indx){
				var carId = $(this).val();
				if ( validaPatente( carId.trim() ) == false || validaNotEmpty( carId.trim() ) == false ) {
					console.log("message");
					flagId = false;
				}
			} );

			if ( flagDoc === false ) {
				$('.error-form').empty().html("Debes seleccionar tipo de indentificación.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;
			};
			if ( flagId === false) {
				$('.error-form').empty().html("Debes ingresar indentificación del vehículo.").fadeIn(300, function(){
					setTimeout(function(){
						$('.error-form').fadeOut(500);
					}, 1500);
				});
				return false;
			};
		};
		if (animating) return false;
		animating = true;

		current_fs = $(this).parent();
		next_fs = $(this).parent().next();

		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		next_fs.show();
		current_fs.animate({
			opacity: 0
		}, {
			step: function(now, mx) {
				scale = 1 - (1 - now) * 0.2;
				left = (now * 50) + "%";
				opacity = 1 - now;
				current_fs.css({
					'transform': 'scale(' + scale + ')'
				});
				next_fs.css({
					'left': left,
					'opacity': opacity
				});
			},
			duration: 800,
			complete: function() {
				current_fs.hide();
				animating = false;
			},

			easing: 'linear'
		});
	});

	$(".previous").click(function() {
		if (animating) return false;
		animating = true;

		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();

		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		previous_fs.show();
		current_fs.animate({
			opacity: 0
		}, {
			step: function(now, mx) {
				scale = 0.8 + (1 - now) * 0.2;
				left = ((1 - now) * 50) + "%";
				opacity = 1 - now;
				current_fs.css({
					'left': left
				});
				previous_fs.css({
					'transform': 'scale(' + scale + ')',
					'opacity': opacity
				});
			},
			duration: 800,
			complete: function() {
				current_fs.hide();
				animating = false;
			},

			easing: 'linear'
		});
	});

	$(".submit").click(function() {
		return false;
	})

	$('.open-popup-link').magnificPopup({
	  type:'inline',
	  midClick: true,
	  mainClass: 'custom-popup-class'
	});

	//Cambiar select comuna
  $("#UsuarioRegionId").change(function(){
      var region_id = $(this).val();
      var optionsSel = '<option value="">Selecciona</option>';
      $.each(comunas, function(index, val){
          if(val.region_id == region_id){
              optionsSel += '<option value="'+val.id+'">'+val.name+'</option>';
          }
      });
      $("#UsuarioComunaId").empty().html(optionsSel);
  });

  $("#addOne").click(function(e){
		e.preventDefault();
		$(".newOne").append( $(".base_car").html() );
	});

	$("#selectPay").click(function(e){
		e.preventDefault();
		if ( validaNotEmpty( $("#UsuarioPaytype").val() ) == false) {
			$('.error-form').empty().html("Debes seleccionar forma de pago.").fadeIn(300, function(){
				setTimeout(function(){
					$('.error-form').fadeOut(500);
				}, 1500);
			});
		} else {
			$.magnificPopup.open({
			  items: {
			    src: $("#popup"),
			    type: 'inline'
			  }
			});
		};

	});

	$("#lastStep").click(function(e){
		e.preventDefault();
		$("#msform").submit();
	});

	$("#addPAC").click(function(e){
		e.preventDefault();
		$(".state-selected").removeClass("selected");
		$(this).addClass("selected");
		$("#UsuarioPaytype").val("PAC");
	});

	$("#addSER").click(function(e){
		e.preventDefault();
		$(".state-selected").removeClass("selected");
		$(this).addClass("selected");
		$("#UsuarioPaytype").val("SERVIPAG");
	});

	$("#addPAT").click(function(e){
		e.preventDefault();
		$(".state-selected").removeClass("selected");
		$(this).addClass("selected");
		$("#UsuarioPaytype").val("PAT");
	});

	$("#addEmailFriend").click(function(e){
		e.preventDefault();
		$(".newOne").append( $(".base_email").html() );
	});

	$("#mailform").submit(function(e){
		
		var flagMail = true;
		$(".mails_friends").each( function(indx){
			var emailFriend = $(this).val();
			if ( validaEmail( emailFriend.trim() ) == false ) {
				flagMail = false;
			}
		} );

		if ( flagMail === false ) {
			$('.error-form').empty().html("Debes ingresar un email válido.").fadeIn(300, function(){
				setTimeout(function(){
					$('.error-form').fadeOut(500);
				}, 1500);
			});
			return false;
		};
		e.preventDefault();
	});
});