<!DOCTYPE html>
<html lang="en">

<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $title; ?> - Suscribe tu TAG
		</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php #echo $this->Html->css('modal'); ?>
		<?php echo $this->Html->css('normalize'); ?>
		<?php echo $this->Html->css('font-awesome.min'); ?>
		<?php echo $this->Html->css('skeleton'); ?>

		<!--[if lt IE 9]>
				<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php echo $this->Html->script('jquery'); ?>
		<?php #echo $this->Html->script('modal'); ?>
		<?php echo $this->Html->script('rut'); ?>
		<?php echo $this->Html->script('validate'); ?>
		<?php echo $this->Html->script('jquery.easing.min'); ?>
		<?php echo $this->Html->script('jquery.mask.min'); ?>
		<?php echo $this->Html->script('scripts'); ?>

		<!-- Add fancyBox main JS and CSS files -->
		<?php echo $this->Html->script('/fancy/jquery.fancybox.js'); ?>
		<?php echo $this->Html->css('/fancy/jquery.fancybox.css', null, array('media' => 'screen')); ?>
		
		<script type="text/javascript">
			var APP_JQ = '<?php echo $html->url("/", true); ?>';
			<?php if ( isset($comunasArr) && !empty($comunasArr) ) { ?>
			var comunas = <?php echo json_encode( $comunasArr ); ?>;
			<?php } ?>
		</script>
</head>

<body>
	<div class="deco"></div>
	<?php echo $this->Session->flash(); ?>
	<div class="error-form"></div>
	<header>
			<div class="container">
					<div class="row">
							<div class="logo-holder four columns">
								<h1 class="logo">
										<a href="https://www.rutamaipo.cl/">
										RUTA DEL MAIPO
										</a>
								</h1>
							</div>


							<div class=" loggin eight columns">
									<div class="row">
											<div class="twelve columns">
												<div class="row">
													<!-- <form class=" inline-form" action="https://www.tagmaipo.cl/Public/Login.aspx" method="post" target="_blank" id="form_auth"> -->

														<!-- <label class="">Ingresar a mi cuenta</label>
														<input class="loggintop" name="ctl00$cphMain$txtRut" id="rut" type="text" placeholder="Rut">
														<input class="loggintop" name="ctl00$cphMain$txtPassword" id="password" type="password" placeholder="Contraseña"> 
														<input class=" button-primary" type="submit" value="IR" name="ctl00$cphMain$btnLogin"> -->
														
													<!-- </form> -->
													<a class="ir_a_cuenta five columns" href="https://www.tagmaipo.cl/Public/Login.aspx">Ingresar a mi cuenta</a>
												</div>
												<div class="row">
													<div class="twelve columns text-right logoption">
														<div class="error_top" style="position: absolute; right: 140px; margin: 0px auto; padding: 5px; color: rgb(255, 255, 255); min-width: 200px; z-index: 9999; text-align: center; top: 41px; border-radius: 3px; display: none; background: rgb(240, 240, 177);font-size: 12px;"></div>
														<a class="forgot-pass" target="blank" href="https://www.tagmaipo.cl/Public/ForgotPassword.aspx">Olvidé mi contraseña</a> &nbsp;
														<a class="forgot-pass" target="blank" href="https://www.tagmaipo.cl/NewAccount/CreateWebAccess.aspx">Crear mi contraseña</a>
													</div>
												</div>
											</div>
									</div>
							</div>
					</div>
			</div>
	</header>
	<?php echo $content_for_layout; ?>
	<footer>
        <div class="container">
            <div class="row">
               
              <div class=" corporativo">
			<div class="four columns">
				<h3><a target="_blank" href="http://www.intervialchile.cl">ISA Intervial Chile</a></h3>
			</div>
			<div class="four columns">
				<h4>Ruta Maipo</h4>
				<p>
					Cerro El Plomo 5630, piso 10, Las Condes<br>
					<!-- Teléfono: (02) 2 599 35 80 <br /> -->
					<!--Fax:--> 					<br>
				</p>
                
                <h4>Atención a Usuarios</h4>
                <p>Teléfono: 600 252 5000</p>
			</div>
			<div class="four columns">
				<h4>Corporativo</h4>
				<div class="menu-pie-holder"><ul class="footernav" id="menu-menu-pie"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-94" id="menu-item-94"><a href="http://www.intervialchile.cl/" target="_blank">Intervial Chile</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-95" id="menu-item-95"><a href="https://mail.rutamaipo.cl/owa" target="_blank">Webmail corporativo</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1601" id="menu-item-1601"><a href="http://rutanet.intervialchile.cl:8080/intranetisa/?page_id=4213" target="_blank">RutaNET</a></li>
</ul></div>			</div>
			<div class="four columns">
				<h4>Otras secciones</h4>
				<div class="menu-pie-otro-holder"><ul class="footernav" id="menu-menu-pie-otro"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-328" id="menu-item-328"><a href="https://www.rutamaipo.cl/?page_id=309">Enlaces de interés</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-918" id="menu-item-918"><a href="https://www.rutamaipo.cl/?page_id=915">Mapa del sitio</a></li>
</ul></div>			</div>
			
		</div>

            </div>
        </div>
    </footer>

    <div id="error-crm" style="display:none;">
	    <div class="container">
	        <div class="row">
	            <div class="eight columns offset-by-two modal-head text-center">
	                <!-- <h3 id="error_modal">Según nuestros registros, usted ya poseé una cuenta.</h3>
	                <h5>Por favor ingrese con su rut y contraseña <a href="">aquí</a></h5> -->

	                <h3 id="error_modal">Según nuestros registros, usted ya poseé una cuenta.</h3>
	                <div class="ya_reg" style="display: none;">
	                	<p><strong>Por favor ingrese con su rut y contraseña <a href="https://www.tagmaipo.cl/Public/Login.aspx" target="_blank">aquí</a></strong></p>
	                	<p>
	                		¿Olvidó su contraseña?, ingrese <a href="https://www.tagmaipo.cl/Public/ForgotPassword.aspx" target="_blank">aquí</a><br>
	                		Primera vez que ingresas?, crea tu contraseña <a href="https://www.tagmaipo.cl/NewAccount/CreateWebAccess.aspx" target="_blank">aquí</a><br>
	                		Para mayor información comuníquese con nuestro Servicio de Atención al Cliente al <a href="tel:600 252 5000">600 252 5000</a>
	                	</p>
	                </div>
	            </div>
	        </div>
	    </div>
    </div>

	<div id="preview-area">
		<div class="spinner">
		  <div class="rect1"></div>
		  <div class="rect2"></div>
		  <div class="rect3"></div>
		  <div class="rect4"></div>
		  <div class="rect5"></div>
		</div>
		<div class="cargando">
			Cargando información, esto puede demorar unos minutos.
		</div>
	</div>
</body>

</html>