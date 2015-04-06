<!DOCTYPE html>
<html lang="en">

<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			Suscribe tu TAG - <?php echo $this->fetch('title'); ?>
		</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php echo $this->Html->css('modal'); ?>
		<?php echo $this->Html->css('normalize'); ?>
		<?php echo $this->Html->css('font-awesome.min'); ?>
		<?php echo $this->Html->css('skeleton'); ?>

		<!--[if lt IE 9]>
				<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php echo $this->Html->script('jquery'); ?>
		<?php echo $this->Html->script('modal'); ?>
		<?php echo $this->Html->script('rut'); ?>
		<?php echo $this->Html->script('validate'); ?>
		<?php echo $this->Html->script('jquery.easing.min'); ?>
		<?php echo $this->Html->script('scripts'); ?>
		<script type="text/javascript">
			var comunas = JSON.parse('<?php echo json_encode($comunasArr, JSON_HEX_QUOT | JSON_HEX_APOS ); ?>');
		</script>
</head>

<body>
	<header>
			<div class="container">
					<div class="row">
							<div class="four columns">
									<!-- <img src="images/logo-header.svg" onerror="this.src='images/logo-header.png'"> -->
									<?php echo $this->Html->image('/images/logo-header.svg', array( "onerror" => "this.src='/images/images/logo-header.png'")); ?>
							</div>
							<div class="eight columns">
									<div class="row">
											<div class="twelve columns">
												<div class="row">
													<form class="inline-form" action="https://www.tagmaipo.cl/Public/Login.aspx" method="post" target="_blank">
														<div class="four columns"><label>Ingresar a mi cuenta</label></div>
														<div class="three columns"><input class="u-full-width" name="ctl00$cphMain$txtRut" id="rut" type="text" placeholder="Rut"></div>
														<div class="three columns"><input class="u-full-width" name="ctl00$cphMain$txtPassword" id="password" type="password" placeholder="Contraseña"></div>
														<div class="one column"><input class="button-primary" type="submit" value="IR" name="ctl00$cphMain$btnLogin"></div>
													</form>
												</div>
												<div class="row">
													<div class="twelve columns text-right">
														<a class="forgot-pass" target="blank" href="https://www.tagmaipo.cl/Public/ForgotPassword.aspx">Olvidé mi contraseña</a>
													</div>
												</div>
											</div>
									</div>
							</div>
					</div>
			</div>
	</header>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
	<footer>
        <div class="container">
            <div class="row">
                <div class="two columns">
                    <!-- <img src="images/logo-footer.svg" onerror="this.src='images/logo-footer.png'"> -->
                    <?php echo $this->Html->image('/images/logo-footer.svg', array( "onerror" => "this.src='/images/images/logo-footer.png'")); ?>
                </div>
                <div class="seven columns">
                    <p><i class="fa fa-map-marker"></i> Cerro El Plomo 5630, piso 10, Las Condes - Santiago - Chile</p>
                </div>
                <div class="three columns">
                    <ul class="list-unstyled">
                        <li><a href="https://www.rutamaipo.cl/" target="_blank"><i class="fa fa-angle-right"></i> Links de Interés</a></li>
                        <li><a href="http://www.intervialchile.cl/" target="_blank"><i class="fa fa-angle-right"></i> INTERVIAL CHILE</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php echo $this->element('sql_dump'); ?>
</body>

</html>