    <section id="tab-section">
        <div class="container">
            <div class="row">
                <div class="eight columns offset-by-two pasos">
                    
                    <?php 
                    echo $this->Form->create(null, array(
                                                'url' => array('controller' => 'pages', 'action' => 'suscribe'),
                                                'inputDefaults' => array(
                                                                    'label' => false,
                                                                    'div' => false
                                                                ),
                                                'id' => 'msform'
                                            ));
                    ?>
                        <ul id="progressbar">
                            <li class="active">Paso 1</li>
                            <li>Paso 2</li>
                            <li>Paso 3</li>
                            <li>Paso 4</li>
                        </ul>
                        <fieldset>
                            <h3>Paso 1 · Datos personales</h3>
                            <div class="row">
                                <div class="six columns">
                                    <label>Nombre</label>
                                    <?php echo $this->Form->input('nombre', array("class" => "u-full-width")); ?>
                                </div>
                                <div class="six columns">
                                    <label>Apellidos</label>
                                    <?php echo $this->Form->input('apellidos', array("class" => "u-full-width")); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="one-third column">
                                    <label>RUT</label>
                                    <?php echo $this->Form->input('rut', array("class" => "u-full-width")); ?>
                                </div>
                                <div class="one-third column">
                                    <label>Contraseña</label>
                                    <?php echo $this->Form->input('p4ss', array("type" => "password", "class" => "u-full-width")); ?>
                                </div>
                                <div class="one-third column">
                                    <label>Repetir Contraseña</label>
                                    <?php echo $this->Form->input('p4ss2', array("type" => "password", "class" => "u-full-width")); ?>
                                </div>
                            </div>
                            <input type="button" name="next" class="next action-button boton-amarillo" value="Siguiente paso" />
                        </fieldset>
                        <fieldset>
                            <h3>Paso 2 · Datos contacto</h3>
                            <div class="row">
                                <div class="six columns">
                                    <label>Dirección</label>
                                    <input class="u-full-width" type="text">
                                </div>
                                <div class="six columns">
                                    <label>Mail</label>
                                    <input class="u-full-width" type="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    <label>Región</label>
                                    <?php echo $this->Form->input('p4ss2', array("type" => "password", "class" => "u-full-width")); ?>
                                    <select class="u-full-width" id="exampleRecipientInput">
                                        <option value="Opcion 1">Opción 1</option>
                                        <option value="Opcion 2">Opción 2</option>
                                        <option value="Opcion 3">Opción 3</option>
                                        <option value="Opcion 4">Opción etc...</option>
                                    </select>
                                </div>
                                <div class="six columns">
                                    <label>Confirma tu mail</label>
                                    <input class="u-full-width" type="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="four columns">
                                    <label>Comuna</label>
                                    <select class="u-full-width" id="exampleRecipientInput">
                                        <option value="Opcion 1">Opción 1</option>
                                        <option value="Opcion 2">Opción 2</option>
                                        <option value="Opcion 3">Opción 3</option>
                                        <option value="Opcion 4">Opción etc...</option>
                                    </select>
                                </div>
                                <div class="two columns">
                                    <label>Cod.</label>
                                    <input class="u-full-width" type="text">
                                </div>
                                <div class="three columns">
                                    <label>Fono</label>
                                    <input class="u-full-width" type="tel">
                                </div>
                                <div class="three columns">
                                    <label>Teléfono móvil</label>
                                    <input class="u-full-width" type="tel">
                                </div>
                            </div>
                            <input type="button" name="previous" class="previous action-button transparent" value="Paso anterior" />
                            <input type="button" name="next" class="next action-button" value="Siguiente paso" />
                        </fieldset>
                        <fieldset>
                            <h3>Paso 3 · Datos de tu vehículo</h3>
                            <div class="row">
                                <div class="six columns">
                                    <select class="u-full-width" id="exampleRecipientInput">
                                        <option value="Opcion 1">Patente</option>
                                        <option value="Opcion 2">Opción 2</option>
                                        <option value="Opcion 3">Opción 3</option>
                                        <option value="Opcion 4">Opción etc...</option>
                                    </select>
                                </div>
                                <div class="six columns">
                                    <input class="u-full-width" type="text" placeholder="(EJ. ABCD12-0)">
                                </div>
                            </div>
                            <div class="row text-left">
                                <a href="#">Agregar otra patente</a>
                            </div>
                            <input type="button" name="previous" class="previous action-button transparent" value="Paso anterior" />
                            <input type="button" name="next" class="next action-button" value="Siguiente paso" />
                        </fieldset>
                        <fieldset>
                            <h3>Paso 4 · Formas de pago</h3>
                            <section class="tablas">
                                <section class="tabla-1 three columns lift plan-tier" onclick="location.href='#';">
                                  <div class="inner-table">
                                    <h4 class="color-1">PAC</h4>
                                    <p>Pago Automático con Cargo a Cuenta Bancaria</p>
                                    <a class="button boton-gris" href="#">Seleccionar</a>
                                  </div>
                                </section>
                                <section class="six columns lift plan-tier callout" onclick="location.href='#';">
                                    <h6>RECOMENDADO</h6>
                                    <div class="inner-table">
                                      <h4>SERVIPAG</h4>
                                      <p>Pago a través de la red de sucursales de SERVIPAG o en www.servipag.cl</p>
                                      <a class="button button-primary" href="#">Seleccionar</a>
                                      <p><strong>¡Habilitación inmediata!</strong></p>
                                      <p>Una vez completado correctamente el registro online</p>
                                    </div>
                                </section>
                                <section class="tabla-3 three columns column lift plan-tier" onclick="location.href='#';">
                                  <div class="inner-table">
                                    <h4 class="color-1">PAT</h4>
                                    <p>Pago Automático con Cargo a Tarjeta de Crédito</p>
                                    <a class="button boton-gris" href="#">Seleccionar</a>
                                  </div>
                                </section>
                                <div style="clear: both"></div>
                            </section>

                            <div class="row">
                                <div class="six columns offset-by-three">
                                    <label>
                                        <input type="checkbox">
                                        <span class="label-body">Acepto el envío de facturas por email</span>
                                    </label>
                                </div>
                            </div>

                            <input type="button" name="previous" class="previous action-button transparent" value="Paso anterior" />

                            <a href="#popup" class="button boton-amarillo open-popup-link">Aceptar</a>

                            <div id="popup" class="mfp-hide">
                              <div class="popup-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="eight columns offset-by-two modal-head text-center">
                                            <h3>Condiciones generales y operativas de uso sistema electrónico de cobro de tarifas o peajes</h3>
                                            <p>Descarga las condiciones generales <a href="#">aquí</a></p>
                                            <a href="bienvenido.html" class="button boton-amarillo">He leído y acepto las condiciones</a>
                                        </div>
                                        <div class="modal-body twelve columns">
                                            <p>ARTICULO PRIMERO: INTRODUCCIÓN.</p>
                                            <p>En el marco de la política de mejoramiento de servicios a los usuarios de obras concesionadas impulsado por el ministerio de Obras Públicas (MOP), en particular en Contratos de Concesión Interurbanos, se ha implementado un Sistema Electrónico de cobro de Tarifas o Peajes en la Concesión Internacional Ruta 5, Tramo Santiago . Talca y Acceso Sur a Santiago (la "Concesión"), en virtud del cual los vehículos provistos de un TAG o Televía habilitado podrán circular por las Vías Dedicadas de Telepeaje sin detención, en un modelo conocido como Non Stop; en las Plazas de Peaje Troncales (3) de la Concesión o por las Vías Mixtas de Telepeaje con detención, en un modelo conocido como Stop & Go en las Plazas de Peaje Troncales (3) y Laterales (39) de la Concesión.</p>
                                            <p>Al cirular los vehículos por dichas Vías Dedicadas o Mixtas de Telepeaje, se realizará una transacción electrónica mediante el TAG o Televía instalado en el vehículo, que deberá ser pagada por el Cliente conforme se indica en las presentes Condiciones Generales y Operativas de Uso Sistema de Cobro Electrónico de Tarifas o Peajes ("Condiciones Generales").</p>
                                            <p>El presente documento tiene por objetivo entregar información sobre las condiciones del Sistema Electrónico de Cobro de Tarifas o Peajes de la Concesión.</p>
                                            <p>ARTÍCULO SEGUNDO: NORMATIVA APLICABLE.</p>
                                            <p>A. Legislación sobre tarifación vial.</p>
                                            <p>El Artículo 75 del DFL MOP Nº 850, de 1997, que fija el texto refundido, coordinado y sistematizado de la Ley Orgánica del MOP y de la Ley de Caminos, establece la facultad del Presidente de la República para establecer peajes en los caminos, puentes y túneles.</p>
                                            <p>El Artículo 87 del mismo cuerpo legal señala, como uno de los instrumentos con que cuenta el MOP para el cumplimiento de sus funciones de planteamiento, estudio, proyección, construcción, ampliación, reparación, conservación y explotación de las obras públicas fiscales, celebrar un contrato adjudicado en licitación pública nacional o internacional, a cambio de la concesión temporal de su explotación, el que se regirá por las normas dispuestas en el DS MOP Nº 900, de 1996, Ley de Concesiones de Obras Públicas, y su reglamento (DS MOP N 956, de 1997).</p>
                                            <p>Se deja constancia que, salvo en lo referente al cobro de tarifas impagas y al régimen de multas por no pago de éstas, no es aplicable a Ruta del Maipo Sociedad Concesionaria S.A. (la "Sociedad Concesionaria") la Ley Nº 20.410, al no haberse acogido ella al nuevo régimen legal conforme a su artículado transitorio. Por lo tanto, cualquier mención que se haga en el presente documento a la Ley de Concesiones de Obras Públicas debe entenderse hecha al DS MOP Nº 900, de 1996, previo a la modificación introducida por la Ley 20.410.</p>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>

                        </fieldset>
                    <?php echo $this->Form->end(); ?>
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