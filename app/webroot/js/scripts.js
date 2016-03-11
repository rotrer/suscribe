var current_fs, next_fs, previous_fs;
var left, opacity, scale;
var animating;
var len_phone = 8;
var download_cgyo = false;
var plates_validated = false;
var rut_step1_validate = false;
var startPlateNum = 1;
$(function() {
	if( $("#flashMessage") ) {
		$('#flashMessage').center(false).fadeIn(300, function(){
			setTimeout(function(){
				$('#flashMessage').fadeOut(500);
			}, 4000);
		});
	}
	//Format Rut
	if( $('#rut') ) $('#rut').Rut();
	if( $('#UsuarioRut') ) $('#UsuarioRut').Rut();
	if( $('#UsuarioRutlegal') ) $('#UsuarioRutlegal').Rut();
	$(document).on("change", ".tac_bancodestino_t", function () {
		$(".tac_rut_t").Rut();
	});

	//Mask campos form
	$("#UsuarioPhone").mask("99999999",{placeholder:""});
	$("#UsuarioMobile").mask("99999999",{placeholder:""});
	//Loop PPU
	$('.car_id').each(function(){
		//PPU autos
		if( $(this).attr('data-type') == 1 ) {
		  $(this).mask("SSAA99",{placeholder:""});
		}
		//PPU motos
		if( $(this).attr('data-type') == 2 ) {
		  $(this).mask("SSA99",{placeholder:""});
		}
	});

	//Copy paste
	$('.noccp').bind("cut copy paste",function(e) {
		e.preventDefault();
	});

	//Top form login validate
	$("#form_auth").submit(function(){
		if ( $.Rut.validar($("#rut").val()) == false) {
			$('.error_top').empty().html("Debes ingresar o corregir su RUT.").fadeIn(300, function(){
				setTimeout(function(){
					$('.error_top').fadeOut(500);
				}, 1500);
			});
			return false;	
		}

		var p4ss = $("#password").val();
		if ( validaNotEmpty( p4ss.trim() ) == false) {
			$('.error_top').empty().html("Debe ingresar su contraseña.").fadeIn(300, function(){
				setTimeout(function(){
					$('.error_top').fadeOut(500);
				}, 1500);
			});
			return false;	
		}
	});

	$(".next").click(function() {
		if ( $(this).hasClass('step1') ) {
			if ( rut_step1_validate == false ) {
				return false;
			}
			
			if( $("#UsuarioWho").val() == "1" ) {
				if ( $.Rut.validar($("#UsuarioRut").val()) == false) {
					showErrorForm("Debes ingresar o corregir su RUT.");
					return false;	
				}

				if ( validaTexto($("#UsuarioFirstName").val()) == false) {
					showErrorForm("Debe ingresar su nombre.");
					return false;	
				}

				if ( validaTexto($("#UsuarioLastName").val()) == false) {
					showErrorForm("Debe ingresar su apellido.");
					return false;	
				}

			} else {
				if ( $.Rut.validar($("#UsuarioRut").val()) == false) {
					showErrorForm("Debes ingresar o corregir su RUT.");
					return false;	
				}

				if ( $.Rut.validar($("#UsuarioRutlegal").val()) == false) {
					showErrorForm("Debes ingresar o corregir su RUT Representante Legal.");
					return false;	
				}

				var UsuarioRazonsocial = $("#UsuarioRazonsocial").val();
				if ( validaTexto( UsuarioRazonsocial.trim() ) == false) {
					showErrorForm("Debe ingresar razón social.");
					return false;	
				}

				if ( validaSelect( $("#UsuarioGiro").val() ) == false) {
					showErrorForm("Debe seleccionar giro.");
					return false;	
				}
			}

			

			var p4ss = $("#UsuarioP4ss").val();
			if ( validaNotEmpty( p4ss.trim() ) == false ) {
				showErrorForm("Debe ingresar su contraseña.");
				return false;	
			}

			if ( checkPassword(p4ss) == false ) {
				showErrorForm("La contraseña ingresada debe contener entre 6 y 20 caracteres alfanuméricos.");
				return false;	
			}

			var p4ssr = $("#UsuarioP4ss2").val();
			if ( validaNotEmpty( p4ssr.trim() ) == false ) {
				showErrorForm("Debe repetir su contraseña.");
				return false;	
			}

			if ( p4ss !== p4ssr ) {
				showErrorForm("Las contraseñas ingresadas no coinciden.");
				return false;	
			}

			if ( validaTexto($("#UsuarioAddress").val()) == false) {
				showErrorForm("Debe ingresar su dirección.");
				return false;	
			}

			if ( validaEmail($("#UsuarioMail").val()) == false) {
				showErrorForm("Debe ingresar su email.");
				return false;	
			}

			if ( validaEmail($("#UsuarioMailr").val()) == false) {
				showErrorForm("Debe repetir su email.");
				return false;	
			}

			if ( validaEmail($("#UsuarioMail").val()) !== validaEmail($("#UsuarioMailr").val()) ) {
				showErrorForm("Los email ingresados no coinciden, favor revisar.");
				return false;	
			}

			if ( validaSelect($("#UsuarioRegionId").val()) == false) {
				showErrorForm("Debes seleccionar su región.");
				return false;	
			}

			if ( validaSelect($("#UsuarioComunaId").val()) == false) {
				showErrorForm("Debes seleccionar su comuna.");
				return false;	
			}

			//Valida código de area y teléfono solo si completo el campo
			var phone = $("#UsuarioPhone").val();
			if ( phone.trim() != "" ) {
				if ( validaSelect($("#UsuarioCod").val()) == false) {
					showErrorForm("Debe seleccionar su código de teléfono.");
					return false;	
				}

				if ( len_phone == 8) {
					var patronPhone =/[0-9 ]{7}\d/;
				} else {
					var patronPhone =/[0-9 ]{6}\d/;
				}

				if ( patronPhone.test( $("#UsuarioPhone").val() ) == false) {
					showErrorForm("Debe ingresar su teléfono.");
					return false;	
				}
			};

			var mobile_phone = $("#UsuarioMobile").val();
			if ( validaPhone( mobile_phone.trim() ) == false || mobile_phone.trim().length < 8) {
				showErrorForm("Debe ingresar su celular.");
				return false;	
			}
		};

		if ( $(this).hasClass('step3') ) {
			if ( $(this).hasClass('disabled') ) {
				return false;
			}
			
			var flagDoc = true;
			var flagId = true;
			var qt_plates_validate = 0;
			$(".car_doc").each( function(indx){
				if ( validaSelect($(this).val()) == false ) {
					flagDoc = false;
				}
			} );

			$(".car_doc").each( function(indx){
				 var type_plate = $(this).val();
				 var type_plate_id = $(this).attr("data-id-plate");
				 var type_plate_letter = '';
				 
				 if (type_plate == "1") { type_plate_letter = "a"}
				 if (type_plate == "2") { type_plate_letter = "b"}
				 if (type_plate == "3") { type_plate_letter = "c"}
				 var val_plate = $("#UsuarioPatente_" + type_plate_id + type_plate_letter).val();
				 
				 if(val_plate.trim() != "") {
				  if (type_plate == "1") {
				   flagDoc = selecpatente( val_plate.trim() );
				  }
				  //Si la fila de la patente tiene valor, valida la clase
				  var val_plate_class = $("#UsuarioClasePatente_" + type_plate_id).val();
				  if( val_plate_class.trim() == "" ) {
				  	flagDoc = false;
				  }
				  qt_plates_validate++;
				 }
			});

			if ( flagDoc === false ) {
				showErrorForm("Debes revisar las patentes ingresadas, presentan un error.");
				return false;
			};

			if ( qt_plates_validate <= 0 ) {
				showErrorForm("Debes ingresar al menos una patente.");
				return false;
			};

			if ( plates_validated == false) {
				showErrorForm("Debes verificar la(s) patente(s) ingresada(s).");
				return false;
			};
			// if ( flagId === false) {
			// 	$('.error-form').empty().html("Debes ingresar indentificación del vehículo.").fadeIn(300, function(){
			// 		setTimeout(function(){
			// 			$('.error-form').fadeOut(500);
			// 		}, 1500);
			// 	});
			// 	return false;
			// };
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

	$("#UsuarioCod").change(function() {
		var code = $(this).val();
		if ( code.length == 2 ) {
			len_phone = 7;
			$("#UsuarioPhone").mask( "9999999",{placeholder:"3349988"} );
		}else{
			len_phone = 8;
			$("#UsuarioPhone").mask( "99999999",{placeholder:"23349988"} );			
		};
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
		if (startPlateNum < 10){
			startPlateNum++;
			$(".newOne_" + startPlateNum).show();	
		}
	});

	$("#selectPay").click(function(e){
		e.preventDefault();
		if ( validaNotEmpty( $("#UsuarioPaytype").val() ) == false) {
			showErrorForm("Debes seleccionar forma de pago.");
		} else {
			if ( $("#UsuarioPaytype").val() == 'PAT' &&  $("#p_card_number").val() == "" ) {
				showErrorForm("Debe completar todos los datos en PAT.");
				return false;
			};
			$.fancybox.open({
				modal: false,
				type: 'inline',
				content: $('#popup').html()
			});
		};

	});

	$(document).on("click", "#downloadCGyO", function (e) {
		download_cgyo = true;
	});

	$(document).on("click", "#lastStep", function (e) {
		e.preventDefault();
		if (download_cgyo == true) {
			$("#preview-area").center(false).show();
			$("#msform").submit();	
		} else {
			showErrorForm("Debe descargar las Condiciones Generales y Operativas de Uso Sistema Electrónico de Cobro de Tarifas o Peajes.", 2500);
		}
		
	});

	$("#addPAC").click(function(e){
		e.preventDefault();
		$(".state-selected").addClass("selected_0ff");
		$(this).removeClass("selected_0ff");
		$("#UsuarioPaytype").val("PAC");
		$.fancybox.open({
			modal: false,
			type: 'inline',
			content: $('#pac-option').html(),
			maxWidth: 500
		});
		limpiaPAT();
	});

	$("#addSER").click(function(e){
		e.preventDefault();
		$(".state-selected").addClass("selected_0ff");
		$(this).removeClass("selected_0ff");
		$("#UsuarioPaytype").val("SERVIPAG");
		limpiaPAT();
	});

	$("#addPAT").click(function(e){
		e.preventDefault();
		$(".state-selected").addClass("selected_0ff");
		$(this).removeClass("selected_0ff");
		$("#UsuarioPaytype").val("PAT");

		var find = '__s';
		var re = new RegExp(find, 'g');

		var htmlPAT = $('#pat-option').html();
			htmlPAT = htmlPAT.replace(re, '_t');

		$.fancybox.open({
			modal: false,
			type: 'inline',
			content: htmlPAT
		});
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
			showErrorForm("Debes ingresar un email válido.");
			return false;
		};

		var data_form = $(this).serialize();
		$.ajax({
			url: APP_JQ + 'invitar',
			type:'POST',
			data: data_form,
			beforeSend: function () {
				$("#preview-area").center(false).show();
			},
			success:function(results){
				$(".hide_friend").hide();
				$("#mailform").hide();
				$(".showFriend").show();

				$("#preview-area").hide(100);
				// showErrorForm("Gracias por recomendar a tus amigos.");
			}
		});
		return false;
	});

	$("#UsuarioP4ss").blur(function(){
		var p4ss = $(this).val();
		if ( p4ss == "" ) {
			return false;
		};
		if ( checkPassword(p4ss) == false ) {
			showErrorForm("La contraseña ingresada debe contener entre 6 y 20 caracteres alfanuméricos.");
			return false;	
		}
	});

	$("#UsuarioRut").blur(function(){
		var daRut = $(this).val();
		if ( daRut.trim() == "" ) {
			return false;
		};
		//Resetear valores datos perosnales
		$("#UsuarioFirstName").val( '' );
		$("#UsuarioLastName").val( '' );
		$("#UsuarioAddress").val( '' );
		
		var rutArr = daRut.split("-");
		var clean_rut = $.Rut.quitarFormato( rutArr[0] );
		if ( $("#UsuarioWho").val() == "1" ) {
			if ( clean_rut > 50000000 ) {
				showErrorForm("Lo sentimos, pero el RUT ingresado no corresponde a un RUT de persona natural.");
				return false;	
			};
		};

		if ( $("#UsuarioWho").val() == "2" ) {
			if ( clean_rut < 50000000 ) {
				showErrorForm("Lo sentimos, pero el RUT ingresado no corresponde a un RUT de empresa.");
				return false;	
			};
		};

		if ( $.Rut.validar( daRut ) == false) {
			showErrorForm("Debes ingresar o corregir su RUT.");
			return false;	
		}

		var rut = $(this).val();
		$.ajax({
			url: APP_JQ + 'ruttoll',
			type:'POST',
			data: "rut=" + rut,
			dataType: 'json',
			beforeSend: function () {
				$(".ya_reg").hide();
				$("#preview-area").center(false).show();
				rut_step1_validate = false;
				$(".step1").addClass('disabled');
			},
			success:function(results){
				if ( results.state == "1" ) {
					rut_step1_validate = true;
					$(".step1").removeClass('disabled');

					$("#preview-area").hide(100);
					if ( results.data.hasOwnProperty("name") == true ) {
						$("#UsuarioFirstName").val( results.data.name );	
					};
					if ( results.data.hasOwnProperty("paternal_last_name") == true ) {
						$("#UsuarioLastName").val( results.data.paternal_last_name + ' ' + results.data.maternal_last_name );
					};
					if ( results.data.hasOwnProperty("street") == true ) {
						$("#UsuarioAddress").val( results.data.street + ' ' + results.data.street_number );
					};
					if ( results.data.hasOwnProperty("business_name") == true ) {
						$("#UsuarioRazonsocial").val( results.data.business_name );	
					};
					if ( results.data.hasOwnProperty("rut_rep") == true ) {
						$("#UsuarioRutlegal").val( results.data.rut_rep );	

						if ( results.data.hasOwnProperty("name") == true ) {
							$("#rep_name").val( results.data.name );	
						};

						if ( results.data.hasOwnProperty("paternal_last_name") == true ) {
							$("#rep_lastname").val( results.data.paternal_last_name );	
						};

						if ( results.data.hasOwnProperty("maternal_last_name") == true ) {
							$("#rep_matlastname").val( results.data.maternal_last_name );	
						};
					};

					if ( results.data.hasOwnProperty("region_id") == true && results.data.hasOwnProperty("comuna_id") == true ) {
						$('#UsuarioRegionId').val( results.data.region_id );
						var region_id = results.data.region_id;
						var optionsSel = '<option value="">Selecciona</option>';
						$.each(comunas, function(index, val){
							if(val.region_id == region_id){
								optionsSel += '<option value="'+val.id+'">'+val.name+'</option>';
							}
						});
						$("#UsuarioComunaId").empty().html( optionsSel );
						$("#UsuarioComunaId").val( results.data.comuna_id );
					}

				} else if ( results.state == "2" ) {
					rut_step1_validate = false;
					$(".step1").addClass('disabled');
					$("#error_modal").empty().text('Según nuestros registros, usted ya posee una Cuenta de Cliente.');
					
					if ( results.data.hasOwnProperty("name") == true ) {
						$("#UsuarioFirstName").val( results.data.name );	
					};
					if ( results.data.hasOwnProperty("paternal_last_name") == true ) {
						$("#UsuarioLastName").val( results.data.paternal_last_name + ' ' + results.data.maternal_last_name );
					};
					if ( results.data.hasOwnProperty("street") == true ) {
						$("#UsuarioAddress").val( results.data.street + ' ' + results.data.street_number );
					};
					if ( results.data.hasOwnProperty("business_name") == true ) {
						$("#UsuarioRazonsocial").val( results.data.business_name );	
					};

					if ( results.data.hasOwnProperty("region_id") == true && results.data.hasOwnProperty("comuna_id") == true ) {
						$('#UsuarioRegionId').val( results.data.region_id );
						var region_id = results.data.region_id;
						var optionsSel = '<option value="">Selecciona</option>';
						$.each(comunas, function(index, val){
							if(val.region_id == region_id){
								optionsSel += '<option value="'+val.id+'">'+val.name+'</option>';
							}
						});
						$("#UsuarioComunaId").empty().html( optionsSel );
						$("#UsuarioComunaId").val( results.data.comuna_id );
					}

					$(".ya_reg").show();
					$("#preview-area").hide(100);
					$.fancybox.open({
						modal: false,
						type: 'inline',
						content: $('#error-crm').html()
					});
				} else if ( results.state == "3" ) {
					rut_step1_validate = false;
					$(".step1").addClass('disabled');
					$("#preview-area").hide(100, function(){
						showErrorForm("Rut no se encuentra en Base de Datos del RNUT, contacte al 600&nbsp252&nbsp5000.", 3500);
					});
				} else if ( results.state == "4" ) {
					rut_step1_validate = false;
					$(".step1").addClass('disabled');
					$("#preview-area").hide(100, function(){
						showErrorForm("Error al envíar los datos.", 3500);
					});
				}
			}
		});
	});
	
	$(document).on("blur", ".car_id", function () {
		var plate = $(this).val();
		var plate_type = $(this).attr('data-type');
		var rut = $("#UsuarioRut").val();
		var type_plate_id = $(this).attr("data-id-plate");

		plates_validated = false;
		$(".step3").addClass('disabled');

		if ( plate.trim() == "" ) {
			return false;
		};

		//Validar formato
		if ( plate_type == "1" ) {
			if ( selecpatente( plate ) == false ) {
				showErrorForm("Pantente incorrecta.");
				return false;
			}
		};
		

		$.ajax({
			url: APP_JQ + 'platetoll',
			type:'POST',
			data: "rut=" + rut + "&plate=" + plate + "&plate_type=" + plate_type,
			dataType: 'json',
			beforeSend: function () {
				$("#preview-area").center(false).show();
				$(".ya_reg").hide();
				$("#UsuarioPatenteTag_" + type_plate_id).val('');
			},
			success:function(results){
				if ( results.state == "0" ) {
					$("#preview-area").hide(100);
					$(".step3").removeClass('disabled');
					$("#UsuarioPatenteData_" + type_plate_id).val( results.data );

							// choicesClass = {	
							// 		"Seleccione Clase" : "",
							// 		"Autos y Camionetas": "2",
							// 		"Buses 2 Ejes": "4",
							// 		"Camiones 2 Ejes": "5",
							// 		"Buses de más de 2 Ejes": "6",
							// 		"Camiones de más de 2 Ejes": "7",
							// 		"Tractores con Trailers": "7",
							// 		"Motos, Motonetas y Sidecards": "1"
							// 	};
							// }

					if ( results.hasOwnProperty("urban_class") == true ) {
						if ( results.urban_class == "1" ) {
							choicesClass = {	
									"Autos y Camionetas": "2"
								};
						};
						if ( results.urban_class == "2" ) {
							choicesClass = {	
									"Seleccione Clase" : "",
									"Buses 2 Ejes": "4",
									"Camiones 2 Ejes": "5",
									"Buses de más de 2 Ejes": "6",
									"Camiones de más de 2 Ejes": "7"
								};
						};
						if ( results.urban_class == "3" ) {
							choicesClass = {	
									"Camiones de más de 2 Ejes": "7"
								};
						};
						if ( results.urban_class == "4" ) {
							choicesClass = {	
									"Motos, Motonetas y Sidecards": "1"
								};
						};

						var $el = $("#UsuarioClasePatente_" + type_plate_id);
							$el.empty(); // remove old options
							$.each(choicesClass, function(value,key) {
								$el.append($("<option></option>")
									.attr("value", key).text(value));
							});
					};

					plates_validated = true;
				} else if ( results.state == "1" ) {
					$("#preview-area").hide(100, function(){
						showErrorForm("Placa patente ya registrado.", 3500);
					});
					$(".step3").addClass('disabled');
					plates_validated = false;
				} else if ( results.state == "2" ) {
					$("#preview-area").hide(100, function(){
						showErrorForm("Placa patente no pertenece al titular de la cuenta.", 3500);
					});
					$(".step3").addClass('disabled');
					plates_validated = false;
				} else if ( results.state == "3" ) {
					$("#preview-area").hide(100, function(){
						showErrorForm("Placa patente no se encuentra en Base de Datos del RNUT, contáctese al 600 252 5000.", 3500);
					});
					$(".step3").addClass('disabled');
					plates_validated = false;
				} else if ( results.state == "4" ) {
					$("#preview-area").hide(100, function(){
						showErrorForm("Error al envíar los datos.", 3500);
					});
				} else {
					$("#preview-area").hide(100, function(){
						showErrorForm("Revise patente ingresada.", 3500);
					});
				}
			}
		});
	});
	
	$(document).on("click", "#card_show_t", function (e) {
		e.preventDefault();

		var state = $(this).attr('data-show');
		if ( state == '1' )
		{
			$(this).attr('data-show', '2').text('Ocultar');
			$('.card_number_hidden').attr('type','text');
		}else{
			$(this).attr('data-show', '1').text('Mostrar');
			$('.card_number_hidden').attr('type','password');
		}
	});

	$(document).on("click", ".ya_registrado", function (e) {
		e.preventDefault();
		if ( $(this).attr('data-confirm') == "1" ) {
			$.fancybox.close()
		} else {
			location.href = APP_JQ;
		}
	});

	$(document).on("change", ".tac_tarjeta_t", function () {
		var card_type = $(this).val();

		if ( card_type == "1" || card_type == "2") {
			cardNumberMaxLength(16);
		} else if ( card_type == "3" ) {
			cardNumberMaxLength(15);
		}
	});

	$(document).on("click", ".save_card_t", function (e) {
		e.preventDefault();
		val_pac();
	});

	$(document).on("click", "#close_pac", function (e) {
		e.preventDefault();
		$.fancybox.close();
	});

	$(document).on("click", ".hide_plate", function (e) {
		e.preventDefault();
		var data = $(this).data();
		$(".newOne_" + data.idplate).hide();
		startPlateNum--;
	});
});

$.fn.center = function(parent) {
    if (parent) {
        parent = this.parent();
    } else {
        parent = window;
    }
    this.css({
        "position": "absolute",
        "z-index": "9999",
        "top": ((($(parent).height() - this.outerHeight()) / 2) + $(parent).scrollTop() + "px"),
        "left": ((($(parent).width() - this.outerWidth()) / 2) + $(parent).scrollLeft() + "px")
    });
	return this;
}

function selecpatente(patente){

	// var pat = patente.split('-');
	// var rut = pat[0];
	// var digitos = rut.slice(2);
	// var dv = pat[1];
	var digitos = patente.slice(2);

	if (isNaN(digitos)==false) {
		return pruebava(rut);
	}	else {
		return pruebavn(rut);
	}

}

function pruebavn(texto) {
	var dv = $.Rut.getDigito(texto);

	String.prototype.replaceArray = function (find, replace) {
		var replaceString = this;
		for (var i = 0; i < find.length; i++) {
			// global replacement
			var pos = replaceString.indexOf(find[i]);
			while (pos > -1) {
				replaceString = replaceString.replace(find[i], replace[i]);
				pos = replaceString.indexOf(find[i]);
			}
		}

		return replaceString;
	};

	var textT = texto.toUpperCase();
	var find = ["B","C","D","F","G","H","J","K","L","P","R","S","T","V","W","X","Y","Z"];
	var replace = ['1','2','3','4','5','6','7','8','9','0','2','3','4','5','6','7','8','9'];
	textT = textT.replaceArray(find, replace);
	textT= textT+dv;

	return $.Rut.validar(textT);
}

function pruebava(texto) {
	var dv = $.Rut.getDigito(texto);

	String.prototype.replaceArray = function (find, replace) {
		var replaceString = this;
		for (var i = 0; i < find.length; i++) {
			// global replacement
			var pos = replaceString.indexOf(find[i]);
			while (pos > -1) {
				replaceString = replaceString.replace(find[i], replace[i]);
				pos = replaceString.indexOf(find[i]);
			}
		}

		return replaceString;
	};

	var textT = texto.toUpperCase();
	var find = ["AA","BA","CA","EA","FA","GA","HA","AB","CB","EB","FB","GB","HB","AC","BC","EC","FC","GC","HC","BD","ED","FD","GD","HD","AE","BE","CE","EE","FE","GE","HE","AF","BF","CF","EF","FF","GF","HF","AG","BG","CG","EG","FG","HG","AH","BH","CH","EH","FH","GH","HH","AJ","BJ","CJ","EJ","FJ","GJ","HJ","BK","CK","EK","FK","GK","HK","AL","BL","CL","EL","FL","GL","HL","AN","BN","CN","EN","FN","GN","HN","AP","BP","CP","EP","FP","GP","HP","AR","BR","CR","ER","FR","GR","HR","AS","BS","CS","ES","FS","GS","HS","AT","BT","CT","ET","FT","GT","HT","AU","BU","CU","EU","FU","GU","HU","AV","BV","CV","EV","FV","GV","HV","AX","BX","CX","EX","FX","GX","HX","BY","CY","EY","FY","GY","HY","AZ","BZ","CZ","EZ","FZ","GZ","DA","DB","DD","DE","DF","DG","DH","DI","DJ","DK","DL","DN","DP","DR","DS","DT","DU","DV","DX","DY","DZ","KA","KB","KC","KD","KE","KF","KG","KH","KJ","KK","KL","KN","KP","KR","KS","KT","KU","KV","KX","KY","KZ","LA","LB","LC","LD","LE","LF","LG","LH","LJ","LK","LL","LN","LP","LR","LS","LT","LU","LV","LX","LY","LZ","NA","NB","NC","ND","NE","NF","NG","NH","NJ","NK","NL","NN","NP","NR","NS","NT","NU","NV","NY","NZ","PA","PB","PC","PD","PE","PF","PG","PH","PJ","PK","PL","PN","PP","PS","PT","PU","PV","PX","PY","PZ","NX","RA","RB","RC","RD","RE","RF","RG","RH","RJ","RK","RL","RN","RP","RR","RS","RT","RU","RV","RX","RY","RZ","HZ","SA","SB","SC","SD","SE","SF","SG","SH","SJ","SK","SL","SN","SP","SR","SS","ST","SU","SV","SX","SY","SZ","TA","TB","TC","TD","TE","TF","TG","TH","TJ","TK","TL","TN","TP","TR","TS","TT","TU","TV","TX","TY","TZ","UA","UB","UC","UD","UE","UF","UG","UH","UJ","UK","UL","UN","UP","UR","US","UT","UU","UV","UX","UY","UZ","VA","VB","VC","VD","VE","VF","VG","VH","VJ","VK","VL","VN","VP","VR","VS","VT","VU","VV","VX","VY","VZ","XA","XB","XC","XD","XE","XF","XG","XH","XJ","XK","XL","XM","XN","XP","XQ","XR","XS","XT","XU","XV","XX","XY","XZ","YA","YB","JA","JB","JC","JD","JE","YC","YD","YE","YF","YG","YH","YJ","YK","YL","YN","YP","YR","YS","YT","YU","YV","YX","YY","YZ","ZA","ZB","ZC","ZD","ZE","ZF","ZG","ZH","ZI","ZJ","ZK","ZL","JF","JG","JH","ZN","ZP","ZR","ZS","ZT","ZU","ZV","ZX","ZY","ZZ","WA","WB","WC","WD","WE","WF","WG","WH","WJ","WK","WL","WN","WP","WR","WS","WT","WU","JJ","JK","WV","WW","WX","WY","WZ","ZW","YW","XW","UW","TW","SW","RW","PW","NW","LW","KW","MZ","MY","MX","MV","MU","MT","MS","JL","JN","JO","JP","JR","JS","JT","JU","JV","JW","JX","JY","JZ","MA","MB","MC","MD","ME","MF","MG","MH","MJ","MK","ML","MN","MP","MR"];
	var replace = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60','61','62','63','64','65','66','67','68','69','70','71','72','73','74','75','76','77','78','79','80','81','82','83','84','85','86','87','88','89','90','91','92','93','94','95','96','97','98','99','100','101','102','103','104','105','106','107','108','109','110','111','112','113','114','115','116','117','118','119','120','121','122','123','124','125','126','127','128','129','130','131','132','133','134','135','136','137','138','139','140','141','142','143','144','145','146','147','148','149','150','151','152','153','154','155','156','157','158','159','160','161','162','163','164','165','166','167','168','169','170','171','172','173','174','175','176','177','178','179','180','181','182','183','184','185','186','187','188','189','190','191','192','193','194','195','196','197','198','199','200','201','202','203','204','205','206','207','208','209','210','211','212','213','214','215','216','217','218','219','220','221','222','223','224','225','226','227','228','229','230','231','232','233','234','235','236','237','238','239','240','241','242','243','244','245','246','247','248','249','250','251','252','253','254','255','256','257','258','259','260','261','262','263','264','265','266','267','268','269','270','271','272','273','274','275','276','277','278','279','280','281','282','283','284','285','286','287','288','289','290','291','292','293','294','295','296','297','298','299','300','301','302','303','304','305','306','307','308','309','310','311','312','313','314','315','316','317','318','319','320','321','322','323','324','325','326','327','328','329','330','331','332','333','334','335','336','337','338','339','340','341','342','343','344','345','346','347','348','349','350','351','352','353','354','355','356','357','358','359','360','361','362','363','364','365','366','367','368','369','370','371','372','373','374','375','376','377','378','379','380','381','382','383','384','385','386','387','388','389','390','391','392','393','394','395','396','397','398','399','400','401','402','403','404','405','406','407','408','409','410','411','412','413','414','415','416','417','418','419','420','421','422','423','430','431','432','433','434','435','436','437','438','439','440','441','442','443','444','445','446','447','448','449','450','451','452','453','454','455','456','457','458','459','460','461','462','463','464','465','466','467','468','469','470','471','424','425','426','247','428','429','472','473','474','475','476','477','478','479','480','481','482','483','484','485','486','487','488','489','490','491','492'];
	textT = textT.replaceArray(find, replace);
	textT= textT+dv;

	return $.Rut.validar(textT);
}

function tipopatente(tipo,op,pos){

	var pid = "UsuarioPatente_" + pos;
	var pidClase = "UsuarioClasePatente_" + pos;
	var choicesClass = {};

	if ( tipo==1   ) {
		$( "#" + pid + "a").fadeIn(0);
		$( "#" + pid + "b").fadeOut(0);
		$( "#" + pid + "c").fadeOut(0);
		choicesClass = {	
			"Seleccione Clase" : ""
		};
	}

	if ( tipo==2   ) {
		$( "#" + pid + "a").fadeOut(0);
		$( "#" + pid + "b").fadeIn(0);
		$( "#" + pid + "c").fadeOut(0);
		choicesClass = {	
			"Motos, Motonetas y Sidecards": "1"
		};
	}

	if ( tipo==3   ) {
		$( "#" + pid + "a").fadeOut(0);
		$( "#" + pid + "b").fadeOut(0);
		$( "#" + pid + "c").fadeIn(0);
		choicesClass = {	
			"Seleccione Clase" : ""
		};
	}

	var $el = $("#" + pidClase);
	$el.empty(); // remove old options
	$.each(choicesClass, function(value,key) {
		$el.append($("<option></option>")
			.attr("value", key).text(value));
	});
}

function cardNumberMaxLength(maxnumber){
	$('.card_number_hidden_t').attr('maxlength',maxnumber);
	$('.card_number_hidden_t').val('');
}

function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : evt.keyCode
	return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function cardShow(){
	var active = $('#card_show_t').prop('checked');
	if ( active )
	{
		$('.card_number_hidden').attr('type','text');
	}else{
		$('.card_number_hidden').attr('type','password');
	}
}

function val_pac(){
	var tac_bancoDestino = $('.tac_bancodestino_t').val();
	$('#p_tac_bancodestino').val($('.tac_bancodestino_t').val());

	var tac_nombre = $('.tac_nombre_t').val();
	$('#p_tac_nombre').val($('.tac_nombre_t').val());


	var tac_tarjeta = "VISA";
	if ( $('#optionsRadios1').is(':checked') ) { var tac_tarjeta = "VISA"; }
	if ( $('#optionsRadios2').is(':checked') ) { var tac_tarjeta = "MASTER"; }
	if ( $('#optionsRadios3').is(':checked') ) { var tac_tarjeta = "AMERICAN"; }

	$('#p_tac_tarjeta').val(tac_tarjeta);

	var tac_rut = $('.tac_rut_t').val();
	$('#p_tac_rut').val($('.tac_rut_t').val());

	var tac_card_number = $('.card_number_hidden_t').val();
	$('#p_card_number').val($('.card_number_hidden_t').val());

	if (tac_tarjeta !== "AMERICAN"){
		if( !isCreditCard( tac_card_number ) ){
			showErrorForm('El numero de tarjeta es invalido');
			return false;
		}

	}

	if (tac_tarjeta == "AMERICAN"){
		if(tac_card_number.length>15 || tac_card_number.length<15){
			showErrorForm('El n&uacute;mero de digitos no corresponde.');
			return false;
		}
	}else{
		if(tac_card_number.length > 16 || tac_card_number.length < 16){
			showErrorForm('El n&uacute;mero de digitos no corresponde.');
			return false;
		}
	}

	var tac_end_date = $('.tac_end_date_t').val();
	$('#p_tac_end_date').val($('.tac_end_date_t').val());
	// $('#e_tac_end_date').val($('.tac_end_date_t').val());      

	if (!tac_bancoDestino){$('.tac_bancodestino_t').focus(); showErrorForm('Es necesario que seleccione un Banco'); return false;}
	if (!tac_tarjeta){$('.tac_tarjeta_t').focus(); showErrorForm('Es necesario que seleccione una tarjeta'); return false;}
	if (!tac_nombre){$('.tac_nombre_t').focus(); showErrorForm('Es necesario que ingrese le nombre del titular'); return false;}
	if (!tac_rut){$('.tac_rut_t').focus(); showErrorForm('Falta el RUT del Titular'); return false;}
	if (!tac_card_number){$('.card_number_hidden_t').focus(); showErrorForm('Faltan datos de la tarjeta.'); return false;}
	if (!tac_end_date){$('.tac_end_date_t').focus(); showErrorForm('Falta la fecha de vencimiento de la tarjeta'); return false;}
	
	$.fancybox.close();

	// $('#pokemonRed').prop('disabled', true);
	//$('#pokemonBlue').prop('disabled', true);

	// $('#pokemonRede').prop('disabled', true);
	//$('#pokemonBlue').prop('disabled', true);

	//Seteo el texto de salida

	// if ($('#pokemonBlue').prop('checked'))
	// {
	// 	$('#texto_salida').html("En los pr&oacute;ximos minutos recibir&aacute; un correo electr&oacute;nico con la confirmaci&oacute;n de su registro al Sistema de TAG Interurbano. &nbsp;Ante cualquier consulta no dude en contactarse con nosotros a trav&eacute;s de nuestra p&aacute;gina web <a href='http://www.rutamaipo.cl'>www.rutamaipo.cl</a> o a trav&eacute;s de nuestro servicio de atenci&oacute;n telef&oacute;nica al <b>600 252 5000</br> Habilitaci&oacute;n en 24 horas h&aacute;biles, una vez completado correctamente el registro. ");
	// }

}

function isCreditCard( CC ){
	if (CC.length > 19)
		return (false);

	sum = 0; mul = 1; l = CC.length;

	for (i = 0; i < l; i++) {
		digit = CC.substring(l-i-1,l-i);
		tproduct = parseInt(digit ,10)*mul;
		if (tproduct >= 10)
			sum += (tproduct % 10) + 1;
		else
			sum += tproduct;

		if (mul == 1)
			mul++;
		else
			mul--;
	}

	if ((sum % 10) == 0)
		return (true);
	else
		return (false);

}

function showErrorForm(texto, timeout){
	if (typeof timeout === 'undefined') { timeout = 1500; }

	$('.error-form').empty().html(texto).center(false).fadeIn(300, function(){
		setTimeout(function(){
			$('.error-form').fadeOut(500);
		}, timeout);
	});
	// $("#faltancampos").fadeIn().attr( "class", "alert-box" ).delay( 2500 ).fadeOut();
	// $("#faltancampos").html(texto);
}

function checkPassword(str){
	var letter = /[a-zA-Z]/;
    var number = /[0-9]/;
	if (str.length < 6 || str.length > 20 || !letter.test(str) || !number.test(str)) {
        return false;
    }

    return true;
}

function limpiaPAT() {
	$("#p_tac_bancodestino").val('');
	$("#p_tac_tarjeta").val('');
	$("#p_tac_nombre").val('');
	$("#p_tac_rut").val('');
	$("#p_card_number").val('');
	$("#p_tac_end_date").val('');
}
