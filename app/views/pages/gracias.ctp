    <section id="tab-section">
        <div class="container">
            <div class="row">
                <div class="twelve columns">
                    <h2 class="section-heading text-center">¡Bienvenido!</h2>
                    <div class="eight columns offset-by-two">
                        <p class="text-center">A partir de hoy, puedes utilizar tu vehículo en nuestro Sistema TAG Interurbano implementado en Angostura y todas las plazas de peajes de la Concesión, facturaremos tu peaje mensualmente y podrás pagar tu cuenta de peaje en Servipag o a través de Pago Automático, según haya sido tu elección.</p>

                        <p class="text-center hide_friend"><strong>¿Tus amigos aún no suscriben su TAG?</strong></p>

                        <p class="text-center hide_friend">Recomienda a un amigo para que al igual que tu gane tiempo en sus viajes.</p>
                        <div class="row">
                            <div class="twelve columns">
                                <h3 class="showFriend" style="display:none;">Gracias por recomendar a tus amigos.</h3>
                                <?php 
                                echo $this->Form->create(null, array(
                                                            'url' => '/',
                                                            'inputDefaults' => array(
                                                                                'label' => false,
                                                                                'div' => false
                                                                            ),
                                                            'id' => 'mailform'
                                                        ));
                                ?>
                                    <div class="eight columns">
                                        <div class="base_email">
                                            <?php echo $this->Form->input("null", array("type" => "text", "class" => "u-full-width mails_friends", "placeholder" => "Ingresa el mail de un amigo", 'name' => 'data[Usuario][mail][]')); ?>
                                        </div>
                                        <div class="newOne">
                                            <!-- nueva file -->
                                        </div>
                                    </div>
                                    <div class="four columns"><input class="u-full-width button-primary" type="submit" value="Enviar"></div>
                                <?php echo $this->Form->end(); ?>

                                <div class="twelve columns">
                                    <a class="link-form hide_friend" href="#" id="addEmailFriend"><i class="fa fa-plus-circle"></i> INGRESAR MÁS CORREOS</a>
                                </div>

                                <div class="twelve columns text-center">
                                    <a class="button boton-amarillo" href="https://www.tagmaipo.cl/Public/Login.aspx" target="_blank">Ir a mi cuenta <i class="fa fa-user"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="atencion row text-center">
                <div class="one-third column">
                    <ul class="list-unstyled">
                        <li>Atención de emergencias</li>
                        <li><i class="fa fa-phone-square"></i> <span class="color-1">600 252 5000 - Op 1</span></li>
                    </ul>
                </div>
                <div class="one-third column">
                    <ul class="list-unstyled">
                        <li>Atención de Clientes TAG Interurbano</li>
                        <li><i class="fa fa-phone-square"></i> <span class="color-1">600 252 5000 - Op 2</span></li>
                    </ul>
                </div>
                <div class="one-third column">
                    <ul class="list-unstyled">
                        <li>Atención de Clientes Tarjeta de Prepago</li>
                        <li><i class="fa fa-phone-square"></i> <span class="color-1">600 252 5000 - Op 3</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>