    <section id="intro">
        <div class="container">
            <div class="row">
                <div class="twelve columns text-center">
                    <h2 class="section-heading">Ahora, suscribir tu tag de siempre es más fácil</h2>
                    <div class="eight columns offset-by-two">
                        <p>Conoce el nuevo sistema de suscripción de TAG de Ruta del Maipo, que te permite pasar inmediatamente por las vías exclusivas de Telepeaje, sin la necesidad de portar efectivo y pagando tu cuenta de peaje en Servipag.</p>
                        <p class="corporativo"><span>Ruta del Maipo - Isa Intervial</span> Ahora viajar al sur es más fácil</p>
                        <div class="row">
                            <div class="box-empieza ten columns offset-by-one">
                                <h3 class="uppercase">¡Empieza ahora!</h3>
                                <p>¿Qué tipo de cliente eres?</p>
                                <div class="row">
                                    <div class="one-half column">
                                        <?php echo $this->Html->link('Persona', array('controller' => 'pages', 'action' => 'suscribe', 'id' => 1), array('class' => 'button boton-amarillo')) ?>
                                        <!-- <a href="tabs.html" class="button boton-amarillo">Persona</a> -->
                                    </div>
                                    <div class="one-half column">
                                        <?php echo $this->Html->link('Empresa', array('controller' => 'pages', 'action' => 'suscribe', 'id' => 2), array('class' => 'button boton-amarillo')) ?>
                                        <!-- <a href="#" class="button boton-amarillo">Empresa</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p><a class="ancla" href="#suscribir">¿Qué beneficios tengo al suscribirme? <i class="fa fa-chevron-down"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="suscribir">
        <div class="container">
            <div class="row">
                <div class="seven columns">
                    <h3 class="section-heading">¿Para qué suscribir mi TAG?</h3>
                    <p>Para ser parte del sistema de TAG interurbano de Ruta Maipo.</p>
                    <p>Suscribe tu TAG de siempre en 4 simples pasos y utiliza de inmediato nuestra moderna infraestructura de cobro.</p>
                    <p>Así podrás transitar por nuestras plazas de peaje sin la necesidad de contar con dinero en efectivo, te facturaremos mensualmente, tendrás control de tu cuenta y podrás pagarla a través de Pagos Automáticos o en SERVIPAG.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="beneficios">
        <div class="container">
            <div class="row">
                <h3 class="section-heading color-1 text-center">¿Qué beneficios tengo al suscribir mi TAG?</h3>
                <div class="row text-center">
                    <div class="one-third column">
                        <img src="images/monedas.svg" onerror="this.src='images/monedas.png'">
                        <p>¡Olvídate del efectivo!</p>
                    </div>
                    <div class="one-third column">
                        <img src="images/ico-autos.svg" onerror="this.src='images/ico-autos.png'">
                        <p>Ahorro de tiempo con el uso de vías exclusivas para Autos y Camionetas sin remolque. Pasa sin detenerse.</p>
                    </div>
                    <div class="one-third column">
                        <img src="images/ico-boletas.svg" onerror="this.src='images/ico-boletas.png'">
                        <p>Detalle de tu facturación mensualmente.</p>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="one-third column">
                        <img src="images/ico-billetes.svg" onerror="this.src='images/ico-billetes.png'">
                        <p>El pago se realizará de forma automática a través del medio escogido (PAC o PAT) o cancelando a través de SERVIPAG.</p>
                    </div>
                    <div class="one-third column">
                        <img src="images/ico-banned.svg" onerror="this.src='images/ico-banned.png'">
                        <p>No tienes cargos adicionales por este servicio.</p>
                    </div>
                    <div class="one-third column">
                        <img src="images/ico-lapiz.svg" onerror="this.src='images/ico-lapiz.png'">
                        <p>Puedes inscribir y llevar el control de todos tus tráficos.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="call-to-action">
        <div class="container">
            <div class="row text-center">
                <p class="call-to-action">No sigas perdiendo el tiempo</p>
                <a href="#intro" class="button boton-amarillo btn-lg">Suscribe tu TAG ¡ahora!</a>
            </div>
        </div>
    </section>
    <section id="alternativa">
        <div class="container">
            <div class="row text-center">
                <h3 class="section-heading color-1">Elige la alternativa de pago que más te acomoda</h3>
                <!-- INICIOS PRECIOS -->
                    <section class="tablas">
                        <section class="tabla-1 one-third column lift plan-tier" onclick="location.href='#intro';">
                          <div class="inner-table">
                            <h4 class="color-1">PAC</h4>
                            <p>Pago Automático con Cargo a Cuenta Bancaria</p>
                          </div>
                        </section>
                        <section class="tabla-2 one-third column lift plan-tier callout" onclick="location.href='#intro';">
                            <h6>RECOMENDADO</h6>
                            <div class="inner-table">
                              <h4>SERVIPAG</h4>
                              <p>Pago a través de la red de sucursales de SERVIPAG o en www.servipag.cl</p>
                              <p><strong>¡Habilitación inmediata!</strong></p>
                              <p>Una vez completado correctamente el registro online</p>
                            </div>
                        </section>
                        <section class="tabla-3 one-third column lift plan-tier" onclick="location.href='#intro';">
                          <div class="inner-table">
                            <h4 class="color-1">PAT</h4>
                            <p>Pago Automático con Cargo a Tarjeta de Crédito</p>
                          </div>
                        </section>
                        <div style="clear: both"></div>
                    </section>
                <!-- FIN PRECIOS -->
            </div>
            <div class="row text-center color-1">
                <div class="one-third column">
                    <ul class="list-unstyled">
                        <li>Atención de emergencias</li>
                        <li><i class="fa fa-phone-square"></i> 600 252 5000 - Op 1</li>
                    </ul>
                </div>
                <div class="one-third column">
                    <ul class="list-unstyled">
                        <li>Atención de Clientes TAG Interurbano</li>
                        <li><i class="fa fa-phone-square"></i> 600 252 5000 - Op 2</li>
                    </ul>
                </div>
                <div class="one-third column">
                    <ul class="list-unstyled">
                        <li>Atención de Clientes Tarjeta de Prepago</li>
                        <li><i class="fa fa-phone-square"></i> 600 252 5000 - Op 3</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>