    <section id="tab-section">
        <div class="container">
            <div class="row">
                <div class="ten columns offset-by-one pasos">
                    
                    <?php 
                    echo $this->Form->create(null, array(
                                                'url' => array('controller' => 'pages', 'action' => 'gracias'),
                                                'inputDefaults' => array(
                                                                    'label' => false,
                                                                    'div' => false
                                                                ),
                                                'id' => 'msform'
                                            ));
                    ?>
                    <?php echo $this->Form->input('who', array("type" => "hidden", "value" => $type)); ?>
                    <?php echo $this->Form->input('paytype', array("type" => "hidden", "value" => "")); ?>
                    <input type="hidden" name="data[Usuario][tac_bancodestino]" id="p_tac_bancodestino" value="">
                    <input type="hidden" name="data[Usuario][tac_tarjeta]" id="p_tac_tarjeta" value="">
                    <input type="hidden" name="data[Usuario][tac_nombre]" id="p_tac_nombre" value="">
                    <input type="hidden" name="data[Usuario][tac_rut]" id="p_tac_rut" value="">
                    <input type="hidden" name="data[Usuario][tac_card_number]" id="p_card_number" value="">
                    <input type="hidden" name="data[Usuario][tac_end_date]" id="p_tac_end_date" value="">

                        <ul id="progressbar">
                            <li class="active">Paso 1</li>
                            <li>Paso 2</li>
                            <li>Paso 3</li>
                            <!-- <li>Paso 4</li> -->
                        </ul>
                        <fieldset>
                        <?php if( $type == 1 ) { ?>
                        
                            <h3>Paso 1 · Datos personales</h3>
                            <div class="row">
                                <div class="one-third column">
                                    <label>RUT</label>
                                    <?php echo $this->Form->input('rut', array("class" => "u-full-width", "placeholder" => '12345678-9')); ?>
                                </div>
                                <div class="one-third column">
                                    <label>Nombre</label>

                                    <?php echo $this->Form->input('first_name', array("class" => "u-full-width")); ?>
                                </div>
                                <div class="one-third column">
                                    <label>Apellidos</label>
                                    <?php echo $this->Form->input('last_name', array("class" => "u-full-width")); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    <label>Contraseña <em style="font-size: 0.7em;">Entre 6 y 20 caracteres alfanuméricos</em></label>
                                    <?php echo $this->Form->input('p4ss', array("type" => "password", "class" => "u-full-width noccp")); ?>
                                </div>
                                <div class="six columns">
                                    <label>Repetir Contraseña</label>
                                    <?php echo $this->Form->input('p4ss2', array("type" => "password", "class" => "u-full-width noccpn")); ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <input type="hidden" name="data[Usuario][rep_name]" id="rep_name" value="">
                            <input type="hidden" name="data[Usuario][rep_lastname]" id="rep_lastname" value="">
                            <input type="hidden" name="data[Usuario][rep_matlastname]" id="rep_matlastname" value="">
                            <h3>Paso 1 · Datos empresa</h3>
                            <div class="row">
                                <div class="six columns">
                                    <label>RUT Empresa</label>
                                    <!-- <input class="u-full-width" type="text"> -->
                                    <?php echo $this->Form->input('rut', array("class" => "u-full-width", "placeholder" => '12345678-9')); ?>
                                </div>
                                <div class="six columns">
                                    <label>RUT Representante Legal</label>
                                    <!-- <input class="u-full-width" type="text"> -->
                                    <?php echo $this->Form->input('rutlegal', array("class" => "u-full-width", "placeholder" => '77666888-9')); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    <label>Razón Social</label>
                                    <!-- <input class="u-full-width" type="text"> -->
                                    <?php echo $this->Form->input('razonsocial', array("class" => "u-full-width", "placeholder" => 'Nombre Empresa')); ?>
                                </div>
                                <div class="six columns">
                                    <label>Giro</label>
                                    <select name="data[Usuario][giro]" class="u-full-width" id="UsuarioGiro">
                                        <option value="">Selecciona</option>
                                        <option value="171200">ACABADO DE PRODUCTOS TEXTIL</option>
                                        <option value="453000">ACONDICIONAMIENTO DE EDIFICIOS</option>
                                        <option value="52020">ACTIVIDAD PESQUERA DE BARCOS FACTORÍAS</option>
                                        <option value="921430">ACTIVIDADES ARTÍSTICAS</option>
                                        <option value="741400">ACTIVIDADES DE ASESORAMIENTO EMPRESARIAL Y EN MATERIA DE GESTIÓN</option>
                                        <option value="923100">ACTIVIDADES DE BIBLIOTECAS Y ARCHIVOS</option>
                                        <option value="924920">ACTIVIDADES DE CASINO DE JUEGOS</option>
                                        <option value="852010">ACTIVIDADES DE CLÍNICAS VETERINARIAS</option>
                                        <option value="924120">ACTIVIDADES DE CLUBES DE DEPORTES Y ESTADIOS</option>
                                        <option value="741200">ACTIVIDADES DE CONTABILIDAD, TENEDURÍA DE LIBROS Y AUDITORÍA</option>
                                        <option value="641200">ACTIVIDADES DE CORREO DISTINTAS DE LAS ACTIVIDADES POSTALES NACIONALES</option>
                                        <option value="659220">ACTIVIDADES DE CRÉDITO PRENDARIO</option>
                                        <option value="752200">ACTIVIDADES DE DEFENSA</option>
                                        <option value="921912">ACTIVIDADES DE DISCOTECAS, CABARET, SALAS DE BAILE Y SIMILARES</option>
                                        <option value="749402">ACTIVIDADES DE FOTOGRAFÍA PUBLICITARIA</option>
                                        <option value="749210">ACTIVIDADES DE INVESTIGACIÓN</option>
                                        <option value="923300">ACTIVIDADES DE JARDINES BOTÁNICOS Y ZOOLÓGICOS Y DE PARQUES NACIONALES</option>
                                        <option value="752300">ACTIVIDADES DE MANTENIMIENTO DEL ORDEN PÚBLICO Y DE SEGURIDAD</option>
                                        <option value="930910">ACTIVIDADES DE MANTENIMIENTO FÍSICO CORPORAL (BAÑOS, TURCOS, SAUNAS)</option>
                                        <option value="153120">ACTIVIDADES DE MOLIENDA DE ARROZ</option>
                                        <option value="923200">ACTIVIDADES DE MUSEOS Y PRESERVACIÓN DE LUGARES Y EDIFICIOS HISTÓRICOS</option>
                                        <option value="911100">ACTIVIDADES DE ORGANIZACIONES EMPRESARIALES Y DE EMPLEADORES</option>
                                        <option value="919200">ACTIVIDADES DE ORGANIZACIONES POLÍTICAS</option>
                                        <option value="919100">ACTIVIDADES DE ORGANIZACIONES RELIGIOSAS</option>
                                        <option value="919990">ACTIVIDADES DE OTRAS ASOCIACIONES N.C.P.</option>
                                        <option value="911290">ACTIVIDADES DE OTRAS ORGANIZACIONES PROFESIONALES</option>
                                        <option value="921920">ACTIVIDADES DE PARQUES DE ATRACCIONES Y CENTROS SIMILARES</option>
                                        <option value="753010">ACTIVIDADES DE PLANES DE SEGURIDAD SOCIAL DE AFILIACIÓN OBLIGATORIA RELACIONADOS CON SALUD</option>
                                        <option value="921320">ACTIVIDADES DE RADIO</option>
                                        <option value="222200">ACTIVIDADES DE SERVICIO RELACIONADA CON LA IMPRESIÓN</option>
                                        <option value="112000">ACTIVIDADES DE SERVICIOS RELACIONADAS CON LA EXTRACCIÓN DE PETRÓLEO Y GAS</option>
                                        <option value="912000">ACTIVIDADES DE SINDICATOS</option>
                                        <option value="749950">ACTIVIDADES DE SUBASTA (MARTILLEROS)</option>
                                        <option value="921310">ACTIVIDADES DE TELEVISIÓN</option>
                                        <option value="751200">ACTIVIDADES DEL PODER JUDICIAL</option>
                                        <option value="751300">ACTIVIDADES DEL PODER LEGISLATIVO</option>
                                        <option value="921420">ACTIVIDADES EMPRESARIALES DE ARTISTAS</option>
                                        <option value="641100">ACTIVIDADES POSTALES NACIONALES</option>
                                        <option value="671100">ADMINISTRACIÓN DE MERCADOS FINANCIEROS</option>
                                        <option value="671921">ADMINISTRADORA DE TARJETAS DE CRÉDITO</option>
                                        <option value="659913">ADMINISTRADORAS DE FICES (FONDOS DE INVERSIÓN DE CAPITAL EXTRANJERO)</option>
                                        <option value="659911">ADMINISTRADORAS DE FONDOS DE INVERSIÓN</option>
                                        <option value="660200">ADMINISTRADORAS DE FONDOS DE PENSIONES (AFP)</option>
                                        <option value="659912">ADMINISTRADORAS DE FONDOS MUTUOS</option>
                                        <option value="659914">ADMINISTRADORAS DE FONDOS PARA LA VIVIENDA</option>
                                        <option value="659915">ADMINISTRADORAS DE FONDOS PARA OTROS FINES Y/O GENERALES</option>
                                        <option value="182000">ADOBO Y TENIDOS DE PIELES</option>
                                        <option value="630910">AGENCIAS DE ADUANAS</option>
                                        <option value="749940">AGENCIAS DE CONTRATACIÓN DE ACTORES</option>
                                        <option value="922001">AGENCIAS DE NOTICIAS</option>
                                        <option value="630920">AGENCIAS DE TRANSPORTE</option>
                                        <option value="921490">AGENCIAS DE VENTA DE BILLETES DE TEATRO, SALAS DE CONCIERTO Y DE TEATRO</option>
                                        <option value="630400">AGENCIAS Y ORGANIZADORES DE VIAJES</option>
                                        <option value="671220">AGENTES DE VALORES</option>
                                        <option value="672020">AGENTES Y LIQUIDADORES DE SEGUROS</option>
                                        <option value="521112">ALMACENES MEDIANOS (VENTA DE ALIMENTOS)</option>
                                        <option value="521120">ALMACENES PEQUENOS (VENTA DE ALIMENTOS)</option>
                                        <option value="711101">ALQUILER DE AUTOS Y CAMIONETAS SIN CHOFER</option>
                                        <option value="713010">ALQUILER DE BICICLETAS Y ARTÍCULOS PARA DEPORTES</option>
                                        <option value="455000">ALQUILER DE EQUIPO DE CONSTRUCCIÓN O DEMOLICIÓN DOTADO DE OPERARIOS</option>
                                        <option value="711300">ALQUILER DE EQUIPO DE TRANSPORTE POR VÍA AÉREA SIN TRIPULANTES</option>
                                        <option value="712100">ALQUILER DE MAQUINARIA Y EQUIPO AGROPECUARIO</option>
                                        <option value="712200">ALQUILER DE MAQUINARIA Y EQUIPO DE CONSTRUCCIÓN E INGENIERÍA CIVIL</option>
                                        <option value="712300">ALQUILER DE MAQUINARIA Y EQUIPO DE OFICINA (SIN OPERARIOS NI SERVICIO ADMINISTRATIVO)</option>
                                        <option value="713030">ALQUILER DE MOBILIARIO PARA EVENTOS (SILLAS, MESAS, MESONES, VAJILLAS, TOLDOS Y RELACIONADOS)</option>
                                        <option value="713090">ALQUILER DE OTROS EFECTOS PERSONALES Y ENSERES DOMÉSTICOS N.C.P.</option>
                                        <option value="711102">ALQUILER DE OTROS EQUIPOS DE TRANSPORTE POR VÍA TERRESTRE SIN OPERARIOS</option>
                                        <option value="712900">ALQUILER DE OTROS TIPOS DE MAQUINARIAS Y EQUIPOS N.C.P.</option>
                                        <option value="711200">ALQUILER DE TRANSPORTE POR VÍA ACUÁTICA SIN TRIPULACIÓN</option>
                                        <option value="12240">APICULTURA</option>
                                        <option value="741190">ARBITRAJES, SÍNDICOS, PERITOS Y OTROS</option>
                                        <option value="701001">ARRIENDO DE INMUEBLES AMOBLADOS O CON EQUIPOS Y MAQUINARIAS</option>
                                        <option value="713020">ARRIENDO DE VIDEOS, JUEGOS DE VIDEO, Y EQUIPOS REPRODUCTORES DE VIDEO, MÚSICA Y SIMILARES</option>
                                        <option value="201000">ASERRADO Y ACEPILLADURA DE MADERAS</option>
                                        <option value="722000">ASESORES Y CONSULTORES EN INFORMÁTICA (SOFTWARE)</option>
                                        <option value="749913">ASESORÍAS EN LA GESTIÓN DE LA COMPRA O VENTA DE PEQUENAS Y MEDIANAS EMPRESAS</option>
                                        <option value="651100">BANCA CENTRAL</option>
                                        <option value="651910">BANCOS</option>
                                        <option value="900020">BARRIDO DE EXTERIORES</option>
                                        <option value="753020">CAJAS DE COMPENSACIÓN</option>
                                        <option value="671910">CÁMARA DE COMPENSACIÓN</option>
                                        <option value="410000">CAPTACIÓN, DEPURACIÓN Y DISTRIBUCIÓN DE AGUA</option>
                                        <option value="671940">CASAS DE CAMBIO Y OPERADORES DE DIVISA</option>
                                        <option value="552030">CASINOS Y CLUBES SOCIALES</option>
                                        <option value="15010">CAZA DE MAMÍFEROS MARINOS</option>
                                        <option value="15090">CAZA ORDINARIA Y MEDIANTE TRAMPAS, Y ACTIVIDADES DE SERVICIOS CONEXAS</option>
                                        <option value="642062">CENTROS DE ACCESO A INTERNET</option>
                                        <option value="851222">CENTROS DE ATENCIÓN ODONTOLÓGICA</option>
                                        <option value="803030">CENTROS DE FORMACIÓN TÉCNICA</option>
                                        <option value="642061">CENTROS DE LLAMADOS</option>
                                        <option value="919910">CENTROS DE MADRES Y UNIDADES VECINALES Y COMUNALES</option>
                                        <option value="671930">CLASIFICADORES DE RIESGOS</option>
                                        <option value="851120">CLÍNICAS PSIQUIATRICAS, CENTROS DE REHABILITACIÓN, ASILOS Y CLÍNICAS DE REPOSO</option>
                                        <option value="919920">CLUBES SOCIALES</option>
                                        <option value="911210">COLEGIOS PROFESIONALES</option>
                                        <option value="524010">COMERCIO AL POR MENOR DE ANTIGUEDADES</option>
                                        <option value="523941">COMERCIO AL POR MENOR DE ARMERÍAS, ARTÍCULOS DE CAZA Y PESCA</option>
                                        <option value="523950">COMERCIO AL POR MENOR DE ARTÍCULOS DE JOYERÍA, FANTASÍAS Y RELOJERÍAS</option>
                                        <option value="523943">COMERCIO AL POR MENOR DE ARTÍCULOS DEPORTIVOS</option>
                                        <option value="523911">COMERCIO AL POR MENOR DE ARTÍCULOS FOTOGRÁFICOS</option>
                                        <option value="523912">COMERCIO AL POR MENOR DE ARTÍCULOS ÓPTICOS</option>
                                        <option value="523991">COMERCIO AL POR MENOR DE ARTÍCULOS TÍPICOS (ARTESANÍAS)</option>
                                        <option value="524090">COMERCIO AL POR MENOR DE ARTÍCULOS Y ARTEFACTOS USADOS N.C.P.</option>
                                        <option value="523942">COMERCIO AL POR MENOR DE BICICLETAS Y SUS REPUESTOS</option>
                                        <option value="523930">COMERCIO AL POR MENOR DE COMPUTADORAS, SOFTWARES Y SUMINISTROS</option>
                                        <option value="523922">COMERCIO AL POR MENOR DE LIBROS</option>
                                        <option value="523430">COMERCIO AL POR MENOR DE PRODUCTOS DE VIDRIO</option>
                                        <option value="523923">COMERCIO AL POR MENOR DE REVISTAS Y DIARIOS</option>
                                        <option value="524020">COMERCIO AL POR MENOR DE ROPA USADA</option>
                                        <option value="523290">COMERCIO AL POR MENOR DE TEXTILES PARA EL HOGAR Y OTROS PRODUCTOS TEXTILES N.C.P.</option>
                                        <option value="522030">COMERCIO AL POR MENOR DE VERDURAS Y FRUTAS (VERDULERÍA)</option>
                                        <option value="523924">COMERCIO DE ARTÍCULOS DE SUMINISTROS DE OFICINAS Y ARTÍCULOS DE ESCRITORIO EN GENERAL</option>
                                        <option value="523921">COMERCIO POR MENOR DE JUGUETES</option>
                                        <option value="701009">COMPRA, VENTA Y ALQUILER (EXCEPTO AMOBLADOS) DE INMUEBLES PROPIOS O ARRENDADOS</option>
                                        <option value="950002">CONSEJO DE ADMINISTRACIÓN DE EDIFICIOS Y CONDOMINIOS</option>
                                        <option value="151120">CONSERVACIÓN DE CARNES ROJAS (FRIGORÍFICOS)</option>
                                        <option value="741130">CONSERVADOR DE BIENES RAICES</option>
                                        <option value="452010">CONSTRUCCIÓN DE EDIFICIOS COMPLETOS O DE PARTES DE EDIFICIOS</option>
                                        <option value="351210">CONSTRUCCIÓN DE EMBARCACIONES DE RECREO Y DEPORTE</option>
                                        <option value="351120">CONSTRUCCIÓN DE EMBARCACIONES MENORES</option>
                                        <option value="351110">CONSTRUCCIÓN Y REPARACIÓN DE BUQUES</option>
                                        <option value="924940">CONTRATACIÓN DE ACTORES PARA CINE, TV, Y TEATRO</option>
                                        <option value="671210">CORREDORES DE BOLSA</option>
                                        <option value="702000">CORREDORES DE PROPIEDADES</option>
                                        <option value="672010">CORREDORES DE SEGUROS</option>
                                        <option value="511020">CORRETAJE DE GANADO (FERIAS DE GANADO)</option>
                                        <option value="511010">CORRETAJE DE PRODUCTOS AGRÍCOLAS</option>
                                        <option value="269600">CORTE, TALLADO Y ACABADO DE LA PIEDRA</option>
                                        <option value="14015">COSECHA, PODA, AMARRE Y LABORES DE ADECUACIÓN DE LA PLANTA U OTRAS</option>
                                        <option value="12230">CRÍA DE ANIMALES DOMÉSTICOS</option>
                                        <option value="12221">CRÍA DE AVES DE CORRAL PARA LA PRODUCCIÓN DE CARNE</option>
                                        <option value="12222">CRÍA DE AVES DE CORRAL PARA LA PRODUCCIÓN DE HUEVOS</option>
                                        <option value="12223">CRÍA DE AVES FINAS O NO TRADICIONALES</option>
                                        <option value="12130">CRÍA DE EQUINOS (CABALLARES, MULARES)</option>
                                        <option value="12111">CRÍA DE GANADO BOVINO PARA LA PRODUCCIÓN LECHERA</option>
                                        <option value="12120">CRÍA DE GANADO OVINO Y/O EXPLOTACIÓN LANERA</option>
                                        <option value="12112">CRÍA DE GANADO PARA PRODUCCIÓN DE CARNE, O COMO GANADO REPRODUCTOR</option>
                                        <option value="12210">CRÍA DE PORCINOS</option>
                                        <option value="11114">CULTIVO DE ARROZ</option>
                                        <option value="11113">CULTIVO DE AVENA</option>
                                        <option value="11142">CULTIVO DE CAMOTES O BATATAS</option>
                                        <option value="11115">CULTIVO DE CEBADA</option>
                                        <option value="11340">CULTIVO DE ESPECIAS</option>
                                        <option value="51010">CULTIVO DE ESPECIES ACUÁTICAS EN CUERPO DE AGUA DULCE</option>
                                        <option value="11193">CULTIVO DE FIBRAS VEGETALES INDUSTRIALES</option>
                                        <option value="11321">CULTIVO DE FRUTALES EN ÁRBOLES O ARBUSTOS CON CICLO DE VIDA MAYOR A UNA TEMPORADA</option>
                                        <option value="11322">CULTIVO DE FRUTALES MENORES EN PLANTAS CON CICLO DE VIDA DE UNA TEMPORADA</option>
                                        <option value="11212">CULTIVO DE HORTALIZAS EN INVERNADEROS Y CULTIVOS HIDROPONICOS</option>
                                        <option value="11112">CULTIVO DE MAIZ</option>
                                        <option value="11152">CULTIVO DE MARAVILLA</option>
                                        <option value="11139">CULTIVO DE OTRAS LEGUMBRES</option>
                                        <option value="11159">CULTIVO DE OTRAS OLEAGINOSAS N.C.P.</option>
                                        <option value="11119">CULTIVO DE OTROS CEREALES</option>
                                        <option value="11149">CULTIVO DE OTROS TUBÉRCULOS N.C.P</option>
                                        <option value="11141">CULTIVO DE PAPAS</option>
                                        <option value="11194">CULTIVO DE PLANTAS AROMÁTICAS O MEDICINALES</option>
                                        <option value="11330">CULTIVO DE PLANTAS CUYAS HOJAS O FRUTAS SE UTILIZAN PARA PREPARAR BEBIDAS</option>
                                        <option value="11220">CULTIVO DE PLANTAS VIVAS Y PRODUCTOS DE LA FLORICULTURA</option>
                                        <option value="11131">CULTIVO DE POROTOS O FRIJOL</option>
                                        <option value="11151">CULTIVO DE RAPS</option>
                                        <option value="11191">CULTIVO DE REMOLACHA</option>
                                        <option value="11192">CULTIVO DE TABACO</option>
                                        <option value="11111">CULTIVO DE TRIGO</option>
                                        <option value="11313">CULTIVO DE UVA DE MESA</option>
                                        <option value="11311">CULTIVO DE UVA DESTINADA A PRODUCCIÓN DE PISCO Y AGUARDIENTE</option>
                                        <option value="11312">CULTIVO DE UVA DESTINADA A PRODUCCIÓN DE VINO</option>
                                        <option value="11122">CULTIVO FORRAJEROS EN PRADERAS MEJORADAS O SEMBRADAS</option>
                                        <option value="11121">CULTIVO FORRAJEROS EN PRADERAS NATURALES</option>
                                        <option value="11213">CULTIVO ORGÁNICO DE HORTALIZAS</option>
                                        <option value="11211">CULTIVO TRADICIONAL DE HORTALIZAS FRESCAS</option>
                                        <option value="11250">CULTIVO Y RECOLECCIÓN DE HONGOS, TRUFAS Y SAVIA</option>
                                        <option value="11132">CULTIVO, PRODUCCIÓN DE LUPINO</option>
                                        <option value="51030">CULTIVO, REPRODUCCIÓN Y CRECIMIENTOS DE VEGETALES ACUÁTICOS</option>
                                        <option value="191100">CURTIDO Y ADOBO DE CUEROS</option>
                                        <option value="749320">DESRATIZACIÓN Y FUMIGACIÓN NO AGRÍCOLA</option>
                                        <option value="14014">DESTRUCCIÓN DE PLAGAS</option>
                                        <option value="749922">DISENADORES DE INTERIORES</option>
                                        <option value="749921">DISENADORES DE VESTUARIO</option>
                                        <option value="401030">DISTRIBUCIÓN DE ENERGIA ELÉCTRICA</option>
                                        <option value="921120">DISTRIBUIDORA CINEMATOGRÁFICAS</option>
                                        <option value="221109">EDICIÓN DE FOLLETOS, PARTITURAS Y OTRAS PUBLICACIONES</option>
                                        <option value="221300">EDICIÓN DE GRABACIONES</option>
                                        <option value="221200">EDICIÓN DE PERIÓDICOS, REVISTAS Y PUBLICACIONES PERIÓDICAS</option>
                                        <option value="221101">EDICIÓN PRINCIPALMENTE DE LIBROS</option>
                                        <option value="809041">EDUCACIÓN A DISTANCIA (INTERNET, CORRESPONDENCIA, OTRAS)</option>
                                        <option value="809030">EDUCACIÓN EXTRAESCOLAR (ESCUELA DE CONDUCCIÓN, MÚSICA, MODELAJE, ETC.)</option>
                                        <option value="151420">ELABORACIÓN DE ACEITES Y GRASAS DE ORIGEN ANIMAL, EXCEPTO LAS MANTEQUILLAS</option>
                                        <option value="151430">ELABORACIÓN DE ACEITES Y GRASAS DE ORIGEN MARINO</option>
                                        <option value="151410">ELABORACIÓN DE ACEITES Y GRASAS DE ORIGEN VEGETAL</option>
                                        <option value="153300">ELABORACIÓN DE ALIMENTOS PREPARADOS PARA ANIMALES</option>
                                        <option value="153210">ELABORACIÓN DE ALMIDONES Y PRODUCTOS DERIVADOS DEL ALMIDÓN</option>
                                        <option value="154200">ELABORACIÓN DE AZÚCAR DE REMOLACHA O CANA</option>
                                        <option value="155120">ELABORACIÓN DE BEBIDAS ALCOHÓLICAS Y DE ALCOHOL ETÍLICO A PARTIR DE SUSTANCIAS FERMENTADAS Y OTROS</option>
                                        <option value="155300">ELABORACIÓN DE BEBIDAS MALTEADAS, CERVEZAS Y MALTAS</option>
                                        <option value="155410">ELABORACIÓN DE BEBIDAS NO ALCOHÓLICAS</option>
                                        <option value="154310">ELABORACIÓN DE CACAO Y CHOCOLATES</option>
                                        <option value="151140">ELABORACIÓN DE CECINAS, EMBUTIDOS Y CARNES EN CONSERVA.</option>
                                        <option value="233000">ELABORACIÓN DE COMBUSTIBLE NUCLEAR</option>
                                        <option value="151222">ELABORACIÓN DE CONGELADOS DE PESCADOS Y MARISCOS</option>
                                        <option value="153220">ELABORACIÓN DE GLUCOSA Y OTROS AZÚCARES DIFERENTES DE LA REMOLACHA</option>
                                        <option value="153110">ELABORACIÓN DE HARINAS DE TRIGO</option>
                                        <option value="155430">ELABORACIÓN DE HIELO</option>
                                        <option value="269510">ELABORACIÓN DE HORMIGÓN, ARTÍCULOS DE HORMIGÓN Y MORTERO (MEZCLA PARA CONSTRUCCIÓN)</option>
                                        <option value="152010">ELABORACIÓN DE LECHE, MANTEQUILLA, PRODUCTOS LÁCTEOS Y DERIVADOS</option>
                                        <option value="154920">ELABORACIÓN DE LEVADURAS NATURALES O ARTIFICIALES</option>
                                        <option value="154400">ELABORACIÓN DE MACARRONES, FIDEOS, ALCUZCUZ Y PRODUCTOS FARINACEOS SIMILARES</option>
                                        <option value="153190">ELABORACIÓN DE OTRAS MOLINERAS Y ALIMENTOS A BASE DE CEREALES</option>
                                        <option value="154990">ELABORACIÓN DE OTROS PRODUCTOS ALIMENTICIOS NO CLASIFICADOS EN OTRA PARTE</option>
                                        <option value="155110">ELABORACIÓN DE PISCOS (INDUSTRIAS PISQUERAS)</option>
                                        <option value="151223">ELABORACIÓN DE PRODUCTOS AHUMADOS, SALADOS, DESHIDRATADOS Y OTROS PROCESOS SIMILARES</option>
                                        <option value="272020">ELABORACIÓN DE PRODUCTOS DE ALUMINIO EN FORMAS PRIMARIAS</option>
                                        <option value="272010">ELABORACIÓN DE PRODUCTOS DE COBRE EN FORMAS PRIMARIAS.</option>
                                        <option value="151230">ELABORACIÓN DE PRODUCTOS EN BASE A VEGETALES ACUÁTICOS</option>
                                        <option value="152020">ELABORACIÓN DE QUESOS</option>
                                        <option value="154910">ELABORACIÓN DE TE, CAFÉ, INFUSIONES</option>
                                        <option value="154930">ELABORACIÓN DE VINAGRES, MOSTAZAS, MAYONESAS Y CONDIMENTOS EN GENERAL</option>
                                        <option value="155200">ELABORACIÓN DE VINOS</option>
                                        <option value="151300">ELABORACIÓN Y CONSERVACIÓN DE FRUTAS, LEGUMBRES Y HORTALIZAS</option>
                                        <option value="671929">EMPRESAS DE ASESORÍA, CONSULTORÍA FINANCIERA Y DE APOYO AL GIRO</option>
                                        <option value="749310">EMPRESAS DE LIMPIEZA DE EDIFICIOS RESIDENCIALES Y NO RESIDENCIALES</option>
                                        <option value="743001">EMPRESAS DE PUBLICIDAD</option>
                                        <option value="742131">EMPRESAS DE SERVICIOS DE TOPOGRAFÍA Y AGRIMENSURA</option>
                                        <option value="742121">EMPRESAS DE SERVICIOS GEOLÓGICOS Y DE PROSPECCIÓN</option>
                                        <option value="726000">EMPRESAS DE SERVICIOS INTEGRALES DE INFORMÁTICA</option>
                                        <option value="749931">EMPRESAS DE TAQUIGRAFÍA, REPRODUCCIÓN, DESPACHO DE CORRESPONDENCIA, Y OTRAS LABORES DE OFICINA</option>
                                        <option value="749933">EMPRESAS DE TRADUCCIÓN E INTERPRETACIÓN</option>
                                        <option value="155420">ENVASADO DE AGUA MINERAL NATURAL, DE MANANTIAL Y POTABLE PREPARADA</option>
                                        <option value="924160">ESCUELAS PARA DEPORTES</option>
                                        <option value="921930">ESPECTÁCULOS CIRCENSES, DE TÍTERES U OTROS SIMILARES</option>
                                        <option value="552020">ESTABLECIMIENTOS DE COMIDA RÁPIDA (BARES, FUENTES DE SODA, GELATERÍAS, PIZZERÍAS Y SIMILARES)</option>
                                        <option value="801010">ESTABLECIMIENTOS DE ENSEÑANZA PREESCOLAR</option>
                                        <option value="809020">ESTABLECIMIENTOS DE ENSEÑANZA PREUNIVERSITARIA</option>
                                        <option value="801020">ESTABLECIMIENTOS DE ENSEÑANZA PRIMARIA</option>
                                        <option value="809010">ESTABLECIMIENTOS DE ENSEÑANZA PRIMARIA Y SECUNDARIA PARA ADULTOS</option>
                                        <option value="802100">ESTABLECIMIENTOS DE ENSEÑANZA SECUNDARIA DE FORMACIÓN GENERAL</option>
                                        <option value="802200">ESTABLECIMIENTOS DE ENSEÑANZA SECUNDARIA DE FORMACIÓN TÉCNICA Y PROFESIONAL</option>
                                        <option value="851212">ESTABLECIMIENTOS MÉDICOS DE ATENCIÓN AMBULATORIA (CENTROS MÉDICOS)</option>
                                        <option value="630320">ESTACIONAMIENTO DE VEHÍCULOS Y PARQUÍMETROS</option>
                                        <option value="749912">EVALUACIÓN Y CALIFICACIÓN DEL GRADO DE SOLVENCIA</option>
                                        <option value="921200">EXHIBICIÓN DE FILMES Y VIDEOCINTAS</option>
                                        <option value="20010">EXPLOTACIÓN DE BOSQUES</option>
                                        <option value="924110">EXPLOTACIÓN DE INSTALACIONES ESPECIALIZADAS PARA LAS PRACTICAS DEPORTIVAS</option>
                                        <option value="142900">EXPLOTACIÓN DE OTRAS MINAS Y CANTERAS N.C.P.</option>
                                        <option value="20030">EXPLOTACIÓN DE VIVEROS DE ESPECIES FORESTALES</option>
                                        <option value="13000">EXPLOTACIÓN MIXTA</option>
                                        <option value="133000">EXTRACCIÓN DE COBRE</option>
                                        <option value="142300">EXTRACCIÓN DE LITIO Y CLORUROS, EXCEPTO SAL</option>
                                        <option value="132030">EXTRACCIÓN DE MANGANESO</option>
                                        <option value="131000">EXTRACCIÓN DE MINERALES DE HIERRO</option>
                                        <option value="120000">EXTRACCIÓN DE MINERALES DE URANIO Y TORIO</option>
                                        <option value="142100">EXTRACCIÓN DE NITRATOS Y YODO</option>
                                        <option value="132010">EXTRACCIÓN DE ORO Y PLATA</option>
                                        <option value="132090">EXTRACCIÓN DE OTROS MINERALES METALÍFEROS N.C.P.</option>
                                        <option value="111000">EXTRACCIÓN DE PETRÓLEO CRUDO Y GAS NATURAL</option>
                                        <option value="141000">EXTRACCIÓN DE PIEDRA, ARENA Y ARCILLA</option>
                                        <option value="142200">EXTRACCIÓN DE SAL</option>
                                        <option value="132020">EXTRACCIÓN DE ZINC Y PLOMO</option>
                                        <option value="100000">EXTRACCIÓN, AGLOMERACIÓN DE CARBÓN DE PIEDRA, LIGNITO Y TURBA</option>
                                        <option value="241200">FABRICACIÓN DE ABONOS Y COMPUESTOS DE NITRÓGENO</option>
                                        <option value="181030">FABRICACIÓN DE ACCESORIOS DE VESTIR</option>
                                        <option value="314000">FABRICACIÓN DE ACUMULADORES DE PILAS Y BATERÍAS PRIMARIAS</option>
                                        <option value="353010">FABRICACIÓN DE AERONAVES Y NAVES ESPACIALES</option>
                                        <option value="312010">FABRICACIÓN DE APARATOS DE DISTRIBUCIÓN Y CONTROL</option>
                                        <option value="293000">FABRICACIÓN DE APARATOS DE USO DOMÉSTICO N.C.P.</option>
                                        <option value="292710">FABRICACIÓN DE ARMAS Y MUNICIONES</option>
                                        <option value="172100">FABRICACIÓN DE ARTÍCULOS CONFECCIONADOS DE MATERIAS TEXTILES, EXCEPTO PRENDAS DE VESTIR</option>
                                        <option value="269590">FABRICACIÓN DE ARTÍCULOS DE CEMENTO Y YESO N.C.P.</option>
                                        <option value="289310">FABRICACIÓN DE ARTÍCULOS DE CUCHILLERÍA</option>
                                        <option value="369300">FABRICACIÓN DE ARTÍCULOS DE DEPORTE</option>
                                        <option value="369990">FABRICACIÓN DE ARTÍCULOS DE OTRAS INDUSTRIAS N.C.P.</option>
                                        <option value="261090">FABRICACIÓN DE ARTÍCULOS DE VIDRIO N.C.P.</option>
                                        <option value="359200">FABRICACIÓN DE BICICLETAS Y DE SILLONES DE RUEDAS PARA INVALIDOS</option>
                                        <option value="291210">FABRICACIÓN DE BOMBAS, GRIFOS, VÁLVULAS, COMPRESORES, SISTEMAS HIDRÁULICOS</option>
                                        <option value="369920">FABRICACIÓN DE BROCHAS, ESCOBAS Y CEPILLOS</option>
                                        <option value="289910">FABRICACIÓN DE CABLES, ALAMBRES Y PRODUCTOS DE ALAMBRE</option>
                                        <option value="192000">FABRICACIÓN DE CALZADO</option>
                                        <option value="241110">FABRICACIÓN DE CARBÓN VEGETAL, Y BRIQUETAS DE CARBÓN VEGETAL</option>
                                        <option value="342000">FABRICACIÓN DE CARROCERÍAS PARA VEHÍCULOS AUTOMOTORES</option>
                                        <option value="210110">FABRICACIÓN DE CELULOSA Y OTRAS PASTAS DE MADERA</option>
                                        <option value="269400">FABRICACIÓN DE CEMENTO, CAL Y YESO</option>
                                        <option value="160010">FABRICACIÓN DE CIGARROS Y CIGARRILLOS</option>
                                        <option value="291310">FABRICACIÓN DE COJINETES, ENGRANAJES, TRENES DE ENGRANAJES Y PIEZAS DE TRANSMISIÓN</option>
                                        <option value="321010">FABRICACIÓN DE COMPONENTES ELECTRÓNICOS</option>
                                        <option value="251110">FABRICACIÓN DE CUBIERTAS Y CÁMARAS DE CAUCHO</option>
                                        <option value="172300">FABRICACIÓN DE CUERDAS, CORDELES, BRAMANTES Y REDES</option>
                                        <option value="291510">FABRICACIÓN DE EQUIPO DE ELEVACIÓN Y MANIPULACIÓN</option>
                                        <option value="331110">FABRICACIÓN DE EQUIPO MÉDICO Y QUIRÚRGICO, Y DE APARATOS ORTOPÉDICOS</option>
                                        <option value="331310">FABRICACIÓN DE EQUIPOS DE CONTROL DE PROCESOS INDUSTRIALES</option>
                                        <option value="242910">FABRICACIÓN DE EXPLOSIVOS Y PRODUCTOS DE PIROTECNIA</option>
                                        <option value="261030">FABRICACIÓN DE FIBRAS DE VIDRIO</option>
                                        <option value="243000">FABRICACIÓN DE FIBRAS MANUFACTURADAS</option>
                                        <option value="369930">FABRICACIÓN DE FÓSFOROS</option>
                                        <option value="154120">FABRICACIÓN DE GALLETAS</option>
                                        <option value="402000">FABRICACIÓN DE GAS</option>
                                        <option value="281310">FABRICACIÓN DE GENERADORES DE VAPOR, EXCEPTO CALDERAS DE AGUA CALIENTE PARA CALEFACCIÓN</option>
                                        <option value="289320">FABRICACIÓN DE HERRAMIENTAS DE MANO Y ARTÍCULOS DE FERRETERÍA</option>
                                        <option value="313000">FABRICACIÓN DE HILOS Y CABLES AISLADOS</option>
                                        <option value="291410">FABRICACIÓN DE HORNOS, HOGARES Y QUEMADORES</option>
                                        <option value="369200">FABRICACIÓN DE INSTRUMENTOS DE MÚSICA</option>
                                        <option value="332020">FABRICACIÓN DE INSTRUMENTOS DE OPTICA N.C.P. Y EQUIPOS FOTOGRÁFICOS</option>
                                        <option value="331210">FABRICACIÓN DE INSTRUMENTOS Y APARATOS PARA MEDIR, VERIFICAR, ENSAYAR, NAVEGAR Y OTROS FINES</option>
                                        <option value="369100">FABRICACIÓN DE JOYAS Y PRODUCTOS CONEXOS</option>
                                        <option value="369400">FABRICACIÓN DE JUEGOS Y JUGUETES</option>
                                        <option value="315010">FABRICACIÓN DE LÁMPARAS Y EQUIPO DE ILUMINACIÓN</option>
                                        <option value="352000">FABRICACIÓN DE LOCOMOTORAS Y DE MATERIAL RODANTE PARA FERROCARRILES Y TRANVÍAS</option>
                                        <option value="191200">FABRICACIÓN DE MALETAS, BOLSOS DE MANO Y SIMILARES</option>
                                        <option value="292110">FABRICACIÓN DE MAQUINARIA AGROPECUARIA Y FORESTAL</option>
                                        <option value="300020">FABRICACIÓN DE MAQUINARIA DE OFICINA, CONTABILIDAD, N.C.P.</option>
                                        <option value="292310">FABRICACIÓN DE MAQUINARIA METALÚRGICA</option>
                                        <option value="292510">FABRICACIÓN DE MAQUINARIA PARA LA ELABORACIÓN DE ALIMENTOS, BEBIDAS Y TABACOS</option>
                                        <option value="292610">FABRICACIÓN DE MAQUINARIA PARA LA ELABORACIÓN DE PRENDAS TEXTILES, PRENDAS DE VESTIR Y CUEROS</option>
                                        <option value="292411">FABRICACIÓN DE MAQUINARIA PARA MINAS Y CANTERAS Y PARA OBRAS DE CONSTRUCCIÓN</option>
                                        <option value="292210">FABRICACIÓN DE MÁQUINAS HERRAMIENTAS</option>
                                        <option value="269910">FABRICACIÓN DE MEZCLAS BITUMINOSAS A BASE DE ASFALTO, DE BETUNES NATURALES, Y PRODUCTOS SIMILARES</option>
                                        <option value="359100">FABRICACIÓN DE MOTOCICLETAS</option>
                                        <option value="291110">FABRICACIÓN DE MOTORES Y TURBINAS, EXCEPTO PARA AERONAVES, VEHÍCULOS AUTOMOTORES Y MOTOCICLETAS</option>
                                        <option value="311010">FABRICACIÓN DE MOTORES, GENERADORES Y TRANSFORMADORES ELÉCTRICOS</option>
                                        <option value="361010">FABRICACIÓN DE MUEBLES PRINCIPALMENTE DE MADERA</option>
                                        <option value="291910">FABRICACIÓN DE OTRO TIPO DE MAQUINARIAS DE USO GENERAL</option>
                                        <option value="210900">FABRICACIÓN DE OTROS ARTÍCULOS DE PAPEL Y CARTÓN</option>
                                        <option value="252090">FABRICACIÓN DE OTROS ARTÍCULOS DE PLÁSTICO</option>
                                        <option value="359900">FABRICACIÓN DE OTROS EQUIPOS DE TRANSPORTE N.C.P.</option>
                                        <option value="361020">FABRICACIÓN DE OTROS MUEBLES N.C.P., INCLUSO COLCHONES</option>
                                        <option value="251900">FABRICACIÓN DE OTROS PRODUCTOS DE CAUCHO</option>
                                        <option value="202900">FABRICACIÓN DE OTROS PRODUCTOS DE MADERA</option>
                                        <option value="160090">FABRICACIÓN DE OTROS PRODUCTOS DEL TABACO</option>
                                        <option value="289990">FABRICACIÓN DE OTROS PRODUCTOS ELABORADOS DE METAL N.C.P.</option>
                                        <option value="269990">FABRICACIÓN DE OTROS PRODUCTOS MINERALES NO METÁLICOS N.C.P</option>
                                        <option value="242990">FABRICACIÓN DE OTROS PRODUCTOS QUÍMICOS N.C.P.</option>
                                        <option value="172990">FABRICACIÓN DE OTROS PRODUCTOS TEXTILES N.C.P.</option>
                                        <option value="319010">FABRICACIÓN DE OTROS TIPOS DE EQUIPO ELÉCTRICO N.C.P.</option>
                                        <option value="292910">FABRICACIÓN DE OTROS TIPOS DE MAQUINARIAS DE USO ESPECIAL</option>
                                        <option value="154110">FABRICACIÓN DE PAN, PRODUCTOS DE PANADERÍA Y PASTELERÍA</option>
                                        <option value="269530">FABRICACIÓN DE PANELES DE YESO PARA LA CONSTRUCCIÓN</option>
                                        <option value="210121">FABRICACIÓN DE PAPEL DE PERIÓDICO</option>
                                        <option value="210129">FABRICACIÓN DE PAPEL Y CARTÓN N.C.P.</option>
                                        <option value="210200">FABRICACIÓN DE PAPEL Y CARTÓN ONDULADO Y DE ENVASES DE PAPEL Y CARTÓN</option>
                                        <option value="292412">FABRICACIÓN DE PARTES PARA MÁQUINAS DE SONDEO O PERFORACIÓN</option>
                                        <option value="343000">FABRICACIÓN DE PARTES Y ACCESORIOS PARA VEHÍCULOS AUTOMOTORES Y SUS MOTORES</option>
                                        <option value="202200">FABRICACIÓN DE PARTES Y PIEZAS DE CARPINTERÍA PARA EDIFICIOS Y CONSTRUCCIONES</option>
                                        <option value="242200">FABRICACIÓN DE PINTURAS, BARNICES Y PRODUCTOS DE REVESTIMIENTO SIMILARES</option>
                                        <option value="242100">FABRICACIÓN DE PLAGUICIDAS Y OTROS PRODUCTOS QUÍMICOS DE USO AGROPECUARIO</option>
                                        <option value="252010">FABRICACIÓN DE PLANCHAS, LÁMINAS, CINTAS, TIRAS DE PLÁSTICO</option>
                                        <option value="241300">FABRICACIÓN DE PLÁSTICOS EN FORMAS PRIMARIAS Y DE CAUCHO SINTÉTICO</option>
                                        <option value="369910">FABRICACIÓN DE PLUMAS Y LÁPICES DE TODA CLASE Y ARTÍCULOS DE ESCRITORIO EN GENERAL</option>
                                        <option value="152030">FABRICACIÓN DE POSTRES A BASE DE LECHE (HELADOS, SORBETES Y OTROS SIMILARES)</option>
                                        <option value="181020">FABRICACIÓN DE PRENDAS DE VESTIR DE CUERO NATURAL, ARTIFICIAL, PLÁSTICO</option>
                                        <option value="181010">FABRICACIÓN DE PRENDAS DE VESTIR TEXTILES Y SIMILARES</option>
                                        <option value="269300">FABRICACIÓN DE PRODUCTOS DE ARCILLA Y CERÁMICAS NO REFRACTARIAS PARA USO ESTRUCTURAL</option>
                                        <option value="269101">FABRICACIÓN DE PRODUCTOS DE CERÁMICA NO REFRACTARIA PARA USO NO ESTRUCTURAL CON FINES ORNAMENTALES</option>
                                        <option value="269109">FABRICACIÓN DE PRODUCTOS DE CERÁMICA NO REFRACTARIA PARA USO NO ESTRUCTURAL N.C.P.</option>
                                        <option value="269200">FABRICACIÓN DE PRODUCTOS DE CERÁMICAS REFRACTARIA</option>
                                        <option value="154320">FABRICACIÓN DE PRODUCTOS DE CONFITERÍA</option>
                                        <option value="269520">FABRICACIÓN DE PRODUCTOS DE FIBROCEMENTO Y ASBESTOCEMENTO</option>
                                        <option value="231000">FABRICACIÓN DE PRODUCTOS DE HORNOS COQUE</option>
                                        <option value="232000">FABRICACIÓN DE PRODUCTOS DE REFINACIÓN DE PETRÓLEO</option>
                                        <option value="151221">FABRICACIÓN DE PRODUCTOS ENLATADOS DE PESCADO Y MARISCOS</option>
                                        <option value="242300">FABRICACIÓN DE PRODUCTOS FARMACEUTICOS, SUSTANCIAS QUÍMICAS MEDICINALES Y PRODUCTOS BOTÁNICOS</option>
                                        <option value="281100">FABRICACIÓN DE PRODUCTOS METÁLICOS DE USO ESTRUCTURAL</option>
                                        <option value="272090">FABRICACIÓN DE PRODUCTOS PRIMARIOS DE METALES PRECIOSOS Y DE OTROS METALES NO FERROSOS N.C.P.</option>
                                        <option value="323000">FABRICACIÓN DE RECEPTORES (RADIO Y TV)</option>
                                        <option value="281211">FABRICACIÓN DE RECIPIENTES DE GAS COMPRIMIDO O LICUADO</option>
                                        <option value="202300">FABRICACIÓN DE RECIPIENTES DE MADERA</option>
                                        <option value="333000">FABRICACIÓN DE RELOJES</option>
                                        <option value="181040">FABRICACIÓN DE ROPA DE TRABAJO</option>
                                        <option value="241190">FABRICACIÓN DE SUSTANCIAS QUÍMICAS BÁSICAS, EXCEPTO ABONOS Y COMPUESTOS DE NITRÓGENO</option>
                                        <option value="202100">FABRICACIÓN DE TABLEROS, PANELES Y HOJAS DE MADERA PARA ENCHAPADO</option>
                                        <option value="281219">FABRICACIÓN DE TANQUES, DEPÓSITOS Y RECIPIENTES DE METAL N.C.P.</option>
                                        <option value="172200">FABRICACIÓN DE TAPICES Y ALFOMBRA</option>
                                        <option value="173000">FABRICACIÓN DE TEJIDOS DE PUNTO</option>
                                        <option value="172910">FABRICACIÓN DE TEJIDOS DE USO INDUSTRIAL COMO TEJIDOS IMPREGNADOS, MOLTOPRENE, BATISTA, ETC.</option>
                                        <option value="322010">FABRICACIÓN DE TRANSMISORES DE RADIO Y TELEVISIÓN, APARATOS PARA TELEFONÍA Y TELEGRAFÍA CON HILOS</option>
                                        <option value="252020">FABRICACIÓN DE TUBOS, MANGUERAS PARA LA CONSTRUCCIÓN</option>
                                        <option value="341000">FABRICACIÓN DE VEHÍCULOS AUTOMOTORES</option>
                                        <option value="261020">FABRICACIÓN DE VIDRIO HUECO</option>
                                        <option value="300010">FABRICACIÓN Y ARMADO DE COMPUTADORES Y HARDWARE EN GENERAL</option>
                                        <option value="332010">FABRICACIÓN Y/O REPARACIÓN DE LENTES Y ARTÍCULOS OFTALMOLÓGICOS</option>
                                        <option value="261010">FABRICACIÓN, MANIPULADO Y TRANSFORMACIÓN DE VIDRIO PLANO</option>
                                        <option value="242400">FABRICACIONES DE JABONES Y DETERGENTES, PREPARADOS PARA LIMPIAR, PERFUMES Y PREPARADOS DE TOCADOR</option>
                                        <option value="659231">FACTORING</option>
                                        <option value="523111">FARMACIAS - PERTENECIENTES A CADENA DE ESTABLECIMIENTOS</option>
                                        <option value="523112">FARMACIAS INDEPENDIENTES</option>
                                        <option value="749962">FERIAS DE EXPOSICIONES CON FINES EMPRESARIALES</option>
                                        <option value="659210">FINANCIAMIENTO DEL FOMENTO DE LA PRODUCCIÓN</option>
                                        <option value="651920">FINANCIERAS</option>
                                        <option value="289100">FORJA, PRENSADO, ESTAMPADO Y LAMINADO DE METAL</option>
                                        <option value="273100">FUNDICIÓN DE HIERRO Y ACERO</option>
                                        <option value="273200">FUNDICIÓN DE METALES NO FERROSOS</option>
                                        <option value="924132">FUTBOL AMATEUR</option>
                                        <option value="924131">FUTBOL PROFESIONAL</option>
                                        <option value="749961">GALERÍAS DE ARTE</option>
                                        <option value="401012">GENERACIÓN EN CENTRALES TERMOELÉCTRICA DE CICLOS COMBINADOS</option>
                                        <option value="401019">GENERACIÓN EN OTRAS CENTRALES N.C.P.</option>
                                        <option value="401013">GENERACIÓN EN OTRAS CENTRALES TERMOELÉCTRICAS</option>
                                        <option value="401011">GENERACIÓN HIDROELÉCTRICA</option>
                                        <option value="751110">GOBIERNO CENTRAL</option>
                                        <option value="521111">GRANDES ESTABLECIMIENTOS (VENTA DE ALIMENTOS)</option>
                                        <option value="521200">GRANDES TIENDAS - PRODUCTOS DE FERRETERÍA Y PARA EL HOGAR</option>
                                        <option value="521300">GRANDES TIENDAS - VESTUARIO Y PRODUCTOS PARA EL HOGAR</option>
                                        <option value="924140">HIPÓDROMOS</option>
                                        <option value="950001">HOGARES PRIVADOS INDIVIDUALES CON SERVICIO DOMÉSTICO</option>
                                        <option value="851110">HOSPITALES Y CLÍNICAS</option>
                                        <option value="551010">HOTELES</option>
                                        <option value="222101">IMPRESIÓN PRINCIPALMENTE DE LIBROS</option>
                                        <option value="271000">INDUSTRIAS BASICAS DE HIERRO Y ACERO</option>
                                        <option value="803020">INSTITUTOS PROFESIONALES</option>
                                        <option value="921911">INSTRUCTORES DE DANZA</option>
                                        <option value="741300">INVESTIGACIÓN DE MERCADOS Y REALIZACIÓN DE ENCUESTAS DE OPINIÓN PÚBLICA</option>
                                        <option value="731000">INVESTIGACIONES Y DESARROLLO EXPERIMENTAL EN EL CAMPO DE LAS CIENCIAS NATURALES Y LA INGENIERÍA</option>
                                        <option value="732000">INVESTIGACIONES Y DESARROLLO EXPERIMENTAL EN EL CAMPO DE LAS CIENCIAS SOCIALES Y LAS HUMANIDADES</option>
                                        <option value="660400">ISAPRES</option>
                                        <option value="851910">LABORATORIOS CLÍNICOS</option>
                                        <option value="331120">LABORATORIOS DENTALES</option>
                                        <option value="930100">LAVADO Y LIMPIEZA DE PRENDAS DE TELA Y DE PIEL, INCLUSO LAS LIMPIEZAS EN SECO</option>
                                        <option value="659110">LEASING FINANCIERO</option>
                                        <option value="659120">LEASING HABITACIONAL</option>
                                        <option value="630100">MANIPULACIÓN DE LA CARGA</option>
                                        <option value="725000">MANTENIMIENTO Y REPARACIÓN DE MAQUINARIA DE OFICINA, CONTABILIDAD E INFORMÁTICA</option>
                                        <option value="502080">MANTENIMIENTO Y REPARACIÓN DE VEHÍCULOS AUTOMOTORES</option>
                                        <option value="525920">MÁQUINAS EXPENDEDORAS</option>
                                        <option value="512210">MAYORISTA DE FRUTAS Y VERDURAS</option>
                                        <option value="512220">MAYORISTAS DE CARNES</option>
                                        <option value="512230">MAYORISTAS DE PRODUCTOS DEL MAR (PESCADO, MARISCOS, ALGAS)</option>
                                        <option value="512240">MAYORISTAS DE VINOS Y BEBIDAS ALCOHÓLICAS Y DE FANTASÍA</option>
                                        <option value="551020">MOTELES</option>
                                        <option value="751120">MUNICIPALIDADES</option>
                                        <option value="452020">OBRAS DE INGENIERÍA</option>
                                        <option value="454000">OBRAS MENORES EN CONSTRUCCIÓN (CONTRATISTAS, ALBANILES, CARPINTEROS)</option>
                                        <option value="990000">ORGANIZACIONES Y ÓRGANOS EXTRATERRITORIALES</option>
                                        <option value="672090">OTRAS ACTIVIDADES AUXILIARES DE LA FINANCIACIÓN DE PLANES DE SEGUROS Y DE PENSIONES N.C.P.</option>
                                        <option value="671990">OTRAS ACTIVIDADES AUXILIARES DE LA INTERMEDIACIÓN FINANCIERA N.C.P.</option>
                                        <option value="630390">OTRAS ACTIVIDADES CONEXAS AL TRANSPORTE N.C.P.</option>
                                        <option value="221900">OTRAS ACTIVIDADES DE EDICIÓN</option>
                                        <option value="921990">OTRAS ACTIVIDADES DE ENTRETENIMIENTO N.C.P.</option>
                                        <option value="222109">OTRAS ACTIVIDADES DE IMPRESIÓN N.C.P.</option>
                                        <option value="900090">OTRAS ACTIVIDADES DE MANEJO DE DESPERDICIOS</option>
                                        <option value="753090">OTRAS ACTIVIDADES DE PLANES DE SEGURIDAD SOCIAL DE AFILIACIÓN OBLIGATORIA</option>
                                        <option value="20049">OTRAS ACTIVIDADES DE SERVICIOS CONEXAS A LA SILVICULTURA N.C.P.</option>
                                        <option value="930390">OTRAS ACTIVIDADES DE SERVICIOS FUNERARIOS Y OTRAS ACTIVIDADES CONEXAS</option>
                                        <option value="930990">OTRAS ACTIVIDADES DE SERVICIOS PERSONALES N.C.P.</option>
                                        <option value="749990">OTRAS ACTIVIDADES EMPRESARIALES N.C.P.</option>
                                        <option value="851990">OTRAS ACTIVIDADES EMPRESARIALES RELACIONADAS CON LA SALUD HUMANA</option>
                                        <option value="924190">OTRAS ACTIVIDADES RELACIONADAS AL DEPORTE N.C.P.</option>
                                        <option value="12290">OTRAS EXPLOTACIONES DE ANIMALES NO CLASIFICADOS EN OTRA PARTE, INCLUIDO SUS SUBPRODUCTOS</option>
                                        <option value="526090">OTRAS REPARACIONES DE EFECTOS PERSONALES Y ENSERES DOMÉSTICOS N.C.P.</option>
                                        <option value="11199">OTROS CULTIVOS N.C.P.</option>
                                        <option value="749929">OTROS DISENADORES N.C.P.</option>
                                        <option value="659290">OTROS INSTITUCIONES FINANCIERAS N.C.P.</option>
                                        <option value="851920">OTROS PROFESIONALES DE LA SALUD</option>
                                        <option value="14019">OTROS SERVICIOS AGRÍCOLAS N.C.P.</option>
                                        <option value="671290">OTROS SERVICIOS DE CORRETAJE</option>
                                        <option value="924990">OTROS SERVICIOS DE DIVERSIÓN Y ESPARCIMIENTOS N.C.P.</option>
                                        <option value="742290">OTROS SERVICIOS DE ENSAYOS Y ANALISIS TÉCNICOS</option>
                                        <option value="642090">OTROS SERVICIOS DE TELECOMUNICACIONES N.C.P.</option>
                                        <option value="742190">OTROS SERVICIOS DESARROLLADOS POR PROFESIONALES</option>
                                        <option value="511030">OTROS TIPOS DE CORRETAJES O REMATES N.C.P. (NO INCLUYE SERVICIOS DE MARTILLERO)</option>
                                        <option value="551090">OTROS TIPOS DE HOSPEDAJE TEMPORAL COMO CAMPING, ALBERGUES, POSADAS, REFUGIOS Y SIMILARES</option>
                                        <option value="651990">OTROS TIPOS DE INTERMEDIACIÓN MONETARIA N.C.P.</option>
                                        <option value="602290">OTROS TIPOS DE TRANSPORTE NO REGULAR DE PASAJEROS N.C.P.</option>
                                        <option value="602190">OTROS TIPOS DE TRANSPORTE REGULAR DE PASAJEROS POR VÍA TERRESTRE N.C.P.</option>
                                        <option value="525990">OTROS TIPOS DE VENTA AL POR MENOR NO REALIZADA EN ALMACENES N.C.P.</option>
                                        <option value="930200">PELUQUERÍAS Y SALONES DE BELLEZA</option>
                                        <option value="52030">PESCA ARTESANAL. EXTRACCIÓN DE RECURSOS ACUÁTICOS EN GENERAL</option>
                                        <option value="52010">PESCA INDUSTRIAL</option>
                                        <option value="660102">PLANES DE REASEGUROS DE VIDA</option>
                                        <option value="660302">PLANES DE REASEGUROS GENERALES</option>
                                        <option value="660101">PLANES DE SEGURO DE VIDA</option>
                                        <option value="660301">PLANES DE SEGUROS GENERALES</option>
                                        <option value="642030">PORTADORES TELEFÓNICOS (LARGA DISTANCIA NACIONAL E INTERNACIONAL)</option>
                                        <option value="171100">PREPARACIÓN DE HILATURA DE FIBRAS TEXTILES</option>
                                        <option value="451010">PREPARACIÓN DEL TERRENO, EXCAVACIONES Y MOVIMIENTOS DE TIERRAS</option>
                                        <option value="724000">PROCESAMIENTO DE DATOS Y ACTIVIDADES RELACIONADAS CON BASES DE DATOS</option>
                                        <option value="151210">PRODUCCIÓN DE HARINA DE PESCADO</option>
                                        <option value="921110">PRODUCCIÓN DE PELÍCULAS CINEMATOGRÁFICAS</option>
                                        <option value="11160">PRODUCCIÓN DE SEMILLAS DE CEREALES, LEGUMBRES, OLEAGINOSAS</option>
                                        <option value="11230">PRODUCCIÓN DE SEMILLAS DE FLORES, PRADOS, FRUTAS Y HORTALIZAS</option>
                                        <option value="11240">PRODUCCIÓN EN VIVEROS</option>
                                        <option value="151110">PRODUCCIÓN, PROCESAMIENTO DE CARNES ROJAS Y PRODUCTOS CÁRNICOS</option>
                                        <option value="151130">PRODUCCIÓN, PROCESAMIENTO Y CONSERVACIÓN DE CARNES DE AVE Y OTRAS CARNES DISTINTAS A LAS ROJAS</option>
                                        <option value="924150">PROMOCIÓN Y ORGANIZACIÓN DE ESPECTÁCULOS DEPORTIVOS</option>
                                        <option value="642050">PROVEEDORES DE INTERNET</option>
                                        <option value="630330">PUERTOS Y AEROPUERTOS</option>
                                        <option value="12250">RANICULTURA, HELICICULTURA U OTRA ACTIVIDAD CON ANIMALES MENORES O INSECTOS</option>
                                        <option value="251120">RECAUCHADO Y RENOVACIÓN DE CUBIERTAS DE CAUCHO</option>
                                        <option value="741140">RECEPTORES JUDICIALES</option>
                                        <option value="371000">RECICLAMIENTO DE DESPERDICIOS Y DESECHOS METÁLICOS</option>
                                        <option value="372090">RECICLAMIENTO DE OTROS DESPERDICIOS Y DESECHOS N.C.P.</option>
                                        <option value="372010">RECICLAMIENTO DE PAPEL</option>
                                        <option value="372020">RECICLAMIENTO DE VIDRIO</option>
                                        <option value="900030">RECOGIDA Y ELIMINACIÓN DE DESECHOS</option>
                                        <option value="20020">RECOLECCIÓN DE PRODUCTOS FORESTALES SILVESTRES</option>
                                        <option value="52040">RECOLECCIÓN DE PRODUCTOS MARINOS, COMO PERLAS NATURALES, ESPONJAS, CORALES Y ALGAS.</option>
                                        <option value="752100">RELACIONES EXTERIORES</option>
                                        <option value="353080">REPARACIÓN DE AERONAVES Y NAVES ESPACIALES</option>
                                        <option value="312080">REPARACIÓN DE APARATOS DE DISTRIBUCIÓN Y CONTROL</option>
                                        <option value="292780">REPARACIÓN DE ARMAS</option>
                                        <option value="291280">REPARACIÓN DE BOMBAS, COMPRESORES, SISTEMAS HIDRÁULICOS, VÁLVULAS Y ARTÍCULOS DE GRIFERÍA</option>
                                        <option value="526010">REPARACIÓN DE CALZADO Y OTROS ARTÍCULOS DE CUERO</option>
                                        <option value="291380">REPARACIÓN DE COJINETES, ENGRANAJES, TRENES DE ENGRANAJES Y PIEZAS DE TRANSMISIÓN</option>
                                        <option value="321080">REPARACIÓN DE COMPONENTES ELECTRÓNICOS</option>
                                        <option value="351280">REPARACIÓN DE EMBARCACIONES DE RECREO Y DEPORTES</option>
                                        <option value="351180">REPARACIÓN DE EMBARCACIONES MENORES</option>
                                        <option value="291580">REPARACIÓN DE EQUIPO DE ELEVACIÓN Y MANIPULACIÓN</option>
                                        <option value="315080">REPARACIÓN DE EQUIPO DE ILUMINACIÓN</option>
                                        <option value="331180">REPARACIÓN DE EQUIPO MÉDICO Y QUIRÚRGICO, Y DE APARATOS ORTOPÉDICOS</option>
                                        <option value="331380">REPARACIÓN DE EQUIPOS DE CONTROL DE PROCESOS INDUSTRIALES</option>
                                        <option value="281380">REPARACIÓN DE GENERADORES DE VAPOR, EXCEPTO CALDERAS DE AGUA CALIENTE PARA CALEFACCIÓN CENTRAL</option>
                                        <option value="291480">REPARACIÓN DE HORNOS, HOGARES Y QUEMADORES</option>
                                        <option value="332080">REPARACIÓN DE INSTRUMENTOS DE OPTICA N.C.P Y EQUIPO FOTOGRÁFICOS</option>
                                        <option value="331280">REPARACIÓN DE INSTRUMENTOS Y APARATOS PARA MEDIR, VERIFICAR, ENSAYAR, NAVEGAR Y OTROS FINES</option>
                                        <option value="292180">REPARACIÓN DE MAQUINARIA AGROPECUARIA Y FORESTAL</option>
                                        <option value="292580">REPARACIÓN DE MAQUINARIA PARA LA ELABORACIÓN DE ALIMENTOS, BEBIDAS Y TABACOS</option>
                                        <option value="292480">REPARACIÓN DE MAQUINARIA PARA LA EXPLOTACIÓN DE PETRÓLEO, MINAS, CANTERAS, Y OBRAS DE CONSTRUCCIÓN</option>
                                        <option value="292380">REPARACIÓN DE MAQUINARIA PARA LA INDUSTRIA METALÚRGICA</option>
                                        <option value="292680">REPARACIÓN DE MAQUINARIA PARA LA INDUSTRIA TEXTIL, DE LA CONFECCIÓN, DEL CUERO Y DEL CALZADO</option>
                                        <option value="292280">REPARACIÓN DE MÁQUINAS HERRAMIENTAS</option>
                                        <option value="504080">REPARACIÓN DE MOTOCICLETAS</option>
                                        <option value="291180">REPARACIÓN DE MOTORES Y TURBINAS, EXCEPTO PARA AERONAVES, VEHÍCULOS AUTOMOTORES Y MOTOCICLETAS</option>
                                        <option value="311080">REPARACIÓN DE MOTORES, GENERADORES Y TRANSFORMADORES ELÉCTRICOS</option>
                                        <option value="319080">REPARACIÓN DE OTROS TIPOS DE EQUIPO ELÉCTRICO N.C.P.</option>
                                        <option value="292980">REPARACIÓN DE OTROS TIPOS DE MAQUINARIA DE USO ESPECIAL</option>
                                        <option value="526030">REPARACIÓN DE RELOJES Y JOYAS</option>
                                        <option value="281280">REPARACIÓN DE TANQUES, DEPÓSITOS Y RECIPIENTES DE METAL</option>
                                        <option value="322080">REPARACIÓN DE TRANSMISORES DE RADIO Y TELEVISIÓN, APARATOS PARA TELEFONÍA Y TELEGRAFÍA CON HILOS</option>
                                        <option value="291980">REPARACIÓN OTROS TIPOS DE MAQUINARIA Y EQUIPOS DE USO GENERAL</option>
                                        <option value="526020">REPARACIONES ELÉCTRICAS Y ELECTRÓNICAS</option>
                                        <option value="223000">REPRODUCCIÓN DE GRABACIONES</option>
                                        <option value="51040">REPRODUCCIÓN Y CRÍA DE MOLUSCOS Y CRUSTACEOS.</option>
                                        <option value="51020">REPRODUCCIÓN Y CRIANZAS DE PECES MARINOS</option>
                                        <option value="551030">RESIDENCIALES</option>
                                        <option value="552010">RESTAURANTES</option>
                                        <option value="924930">SALAS DE BILLAR, BOWLING, POOL Y JUEGOS ELECTRÓNICOS</option>
                                        <option value="659232">SECURITIZADORAS</option>
                                        <option value="14011">SERVICIO DE CORTE Y ENFARDADO DE FORRAJE</option>
                                        <option value="502010">SERVICIO DE LAVADO DE VEHÍCULOS AUTOMOTORES</option>
                                        <option value="14012">SERVICIO DE RECOLECCIÓN, EMPACADO, TRILLA, DESCASCARAMIENTO Y DESGRANE</option>
                                        <option value="742210">SERVICIO DE REVISIÓN TÉCNICA DE VEHÍCULOS AUTOMOTORES</option>
                                        <option value="14013">SERVICIO DE ROTURACIÓN SIEMBRA Y SIMILARES</option>
                                        <option value="741120">SERVICIO NOTARIAL</option>
                                        <option value="14021">SERVICIOS DE ADIESTRAMIENTO, GUARDERÍA Y CUIDADOS DE MASCOTAS</option>
                                        <option value="630200">SERVICIOS DE ALMACENAMIENTO Y DEPÓSITO</option>
                                        <option value="742110">SERVICIOS DE ARQUITECTURA Y TÉCNICO RELACIONADO</option>
                                        <option value="552050">SERVICIOS DE BANQUETES, BODAS Y OTRAS CELEBRACIONES</option>
                                        <option value="930330">SERVICIOS DE CARROZAS FÚNEBRES (TRANSPORTE DE CADÁVERES)</option>
                                        <option value="749911">SERVICIOS DE COBRANZA DE CUENTAS</option>
                                        <option value="552040">SERVICIOS DE COMIDA PREPARADA EN FORMA INDUSTRIAL</option>
                                        <option value="749970">SERVICIOS DE CONTESTACIÓN DE LLAMADAS (CALL CENTER)</option>
                                        <option value="20043">SERVICIOS DE CONTROL DE INCENDIOS FORESTALES</option>
                                        <option value="20042">SERVICIOS DE CORTA DE MADERA</option>
                                        <option value="451020">SERVICIOS DE DEMOLICIÓN Y EL DERRIBO DE EDIFICIOS Y OTRAS ESTRUCTURAS</option>
                                        <option value="749500">SERVICIOS DE ENVASADO Y EMPAQUE</option>
                                        <option value="900040">SERVICIOS DE EVACUACIÓN DE RILES Y AGUAS SERVIDAS</option>
                                        <option value="20041">SERVICIOS DE FORESTACIÓN</option>
                                        <option value="749934">SERVICIOS DE FOTOCOPIAS</option>
                                        <option value="742141">SERVICIOS DE INGENIERÍA PRESTADOS POR EMPRESAS N.C.P.</option>
                                        <option value="742142">SERVICIOS DE INGENIERÍA PRESTADOS POR PROFESIONALES N.C.P.</option>
                                        <option value="919930">SERVICIOS DE INSTITUTOS DE ESTUDIOS, FUNDACIONES, CORPORACIONES DE DESARROLLO (EDUCACIÓN, SALUD)</option>
                                        <option value="851211">SERVICIOS DE MÉDICOS EN FORMA INDEPENDIENTE</option>
                                        <option value="852021">SERVICIOS DE MÉDICOS VETERINARIOS EN FORMA INDEPENDIENTE</option>
                                        <option value="851221">SERVICIOS DE ODONTÓLOGOS EN FORMA INDEPENDIENTE</option>
                                        <option value="552090">SERVICIOS DE OTROS ESTABLECIMIENTOS QUE EXPENDEN COMIDAS Y BEBIDAS</option>
                                        <option value="852029">SERVICIOS DE OTROS PROFESIONALES INDEPENDIENTES EN EL ÁREA VETERINARIA</option>
                                        <option value="921411">SERVICIOS DE PRODUCCIÓN DE RECITALES Y OTROS EVENTOS MUSICALES MASIVOS</option>
                                        <option value="921419">SERVICIOS DE PRODUCCIÓN TEATRAL Y OTROS N.C.P.</option>
                                        <option value="749190">SERVICIOS DE RECLUTAMIENTO DE PERSONAL</option>
                                        <option value="502020">SERVICIOS DE REMOLQUE DE VEHÍCULOS (GRUAS)</option>
                                        <option value="749401">SERVICIOS DE REVELADO, IMPRESIÓN, AMPLIACIÓN DE FOTOGRAFÍAS</option>
                                        <option value="642010">SERVICIOS DE TELEFONÍA FIJA</option>
                                        <option value="642020">SERVICIOS DE TELEFONÍA MÓVIL</option>
                                        <option value="642040">SERVICIOS DE TELEVISIÓN NO ABIERTA</option>
                                        <option value="602220">SERVICIOS DE TRANSPORTE A TURISTAS</option>
                                        <option value="602160">SERVICIOS DE TRANSPORTE DE TRABAJADORES</option>
                                        <option value="602150">SERVICIOS DE TRANSPORTE ESCOLAR</option>
                                        <option value="900050">SERVICIOS DE TRATAMIENTO DE RILES Y AGUAS SERVIDAS</option>
                                        <option value="900010">SERVICIOS DE VERTEDEROS</option>
                                        <option value="930320">SERVICIOS EN CEMENTERIOS</option>
                                        <option value="930310">SERVICIOS FUNERARIOS</option>
                                        <option value="14022">SERVICIOS GANADEROS, EXCEPTO ACTIVIDADES VETERINARIAS</option>
                                        <option value="749221">SERVICIOS INTEGRALES DE SEGURIDAD</option>
                                        <option value="741110">SERVICIOS JURÍDICOS</option>
                                        <option value="922002">SERVICIOS PERIODÍSTICOS PRESTADO POR PROFESIONALES</option>
                                        <option value="809049">SERVICIOS PERSONALES DE EDUCACIÓN</option>
                                        <option value="749409">SERVICIOS PERSONALES DE FOTOGRAFÍA</option>
                                        <option value="749932">SERVICIOS PERSONALES DE TRADUCCIÓN, INTERPRETACIÓN Y LABORES DE OFICINA</option>
                                        <option value="743002">SERVICIOS PERSONALES EN PUBLICIDAD</option>
                                        <option value="749229">SERVICIOS PERSONALES RELACIONADOS CON SEGURIDAD</option>
                                        <option value="630340">SERVICIOS PRESTADOS POR CONCESIONARIOS DE CARRETERAS</option>
                                        <option value="742132">SERVICIOS PROFESIONALES DE TOPOGRAFÍA Y AGRIMENSURA</option>
                                        <option value="742122">SERVICIOS PROFESIONALES EN GEOLOGÍA Y PROSPECCIÓN</option>
                                        <option value="51090">SERVICIOS RELACIONADOS CON LA ACUICULTURA, NO INCLUYE SERVICIOS PROFESIONALES Y DE EXTRACCIÓN</option>
                                        <option value="52050">SERVICIOS RELACIONADOS CON LA PESCA, NO INCLUYE SERVICIOS PROFESIONALES</option>
                                        <option value="853100">SERVICIOS SOCIALES CON ALOJAMIENTO</option>
                                        <option value="853200">SERVICIOS SOCIALES SIN ALOJAMIENTO</option>
                                        <option value="749110">SERVICIOS SUMINISTRO DE PERSONAL</option>
                                        <option value="924910">SISTEMAS DE JUEGOS DE AZAR MASIVOS.</option>
                                        <option value="659920">SOCIEDADES DE INVERSIÓN Y RENTISTAS DE CAPITALES MOBILIARIOS EN GENERAL</option>
                                        <option value="403000">SUMINISTRO DE VAPOR Y AGUA CALIENTE</option>
                                        <option value="630310">TERMINALES TERRESTRES DE PASAJEROS</option>
                                        <option value="401020">TRANSMISIÓN DE ENERGÍA ELÉCTRICA</option>
                                        <option value="602300">TRANSPORTE DE CARGA POR CARRETERA</option>
                                        <option value="601002">TRANSPORTE DE CARGA POR FERROCARRILES</option>
                                        <option value="612002">TRANSPORTE DE CARGA POR VÍAS DE NAVEGACIÓN INTERIORES</option>
                                        <option value="602230">TRANSPORTE DE PASAJEROS EN VEHÍCULOS DE TRACCIÓN HUMANA Y ANIMAL</option>
                                        <option value="612001">TRANSPORTE DE PASAJEROS POR VÍAS DE NAVEGACIÓN INTERIORES</option>
                                        <option value="749222">TRANSPORTE DE VALORES</option>
                                        <option value="601001">TRANSPORTE INTERURBANO DE PASAJEROS POR FERROCARRILES</option>
                                        <option value="602130">TRANSPORTE INTERURBANO DE PASAJEROS VÍA AUTOBUS</option>
                                        <option value="611002">TRANSPORTE MARÍTIMO Y DE CABOTAJE DE CARGA</option>
                                        <option value="611001">TRANSPORTE MARÍTIMO Y DE CABOTAJE DE PASAJEROS</option>
                                        <option value="622002">TRANSPORTE NO REGULAR POR VÍA AÉREA DE CARGA</option>
                                        <option value="622001">TRANSPORTE NO REGULAR POR VÍA AÉREA DE PASAJEROS</option>
                                        <option value="603000">TRANSPORTE POR TUBERÍAS</option>
                                        <option value="621020">TRANSPORTE REGULAR POR VÍA AÉREA DE CARGA</option>
                                        <option value="621010">TRANSPORTE REGULAR POR VÍA AÉREA DE PASAJEROS</option>
                                        <option value="602120">TRANSPORTE URBANO DE PASAJEROS VÍA AUTOBUS (LOCOMOCIÓN COLECTIVA)</option>
                                        <option value="602110">TRANSPORTE URBANO DE PASAJEROS VÍA FERROCARRIL (INCLUYE METRO)</option>
                                        <option value="602140">TRANSPORTE URBANO DE PASAJEROS VÍA TAXI COLECTIVO</option>
                                        <option value="602210">TRANSPORTES POR TAXIS LIBRES Y RADIOTAXIS</option>
                                        <option value="289200">TRATAMIENTOS Y REVESTIMIENTOS DE METALES</option>
                                        <option value="803010">UNIVERSIDADES</option>
                                        <option value="512110">VENTA AL POR MAYOR DE ANIMALES VIVOS</option>
                                        <option value="513930">VENTA AL POR MAYOR DE ARTÍCULOS DE PERFUMERÍA, COSMÉTICOS, JABONES Y PRODUCTOS DE LIMPIEZA</option>
                                        <option value="513920">VENTA AL POR MAYOR DE ARTÍCULOS ELÉCTRICOS Y ELECTRÓNICOS PARA EL HOGAR</option>
                                        <option value="514130">VENTA AL POR MAYOR DE COMBUSTIBLES GASEOSOS</option>
                                        <option value="514110">VENTA AL POR MAYOR DE COMBUSTIBLES LÍQUIDOS</option>
                                        <option value="514120">VENTA AL POR MAYOR DE COMBUSTIBLES SÓLIDOS</option>
                                        <option value="512250">VENTA AL POR MAYOR DE CONFITES</option>
                                        <option value="514920">VENTA AL POR MAYOR DE DESECHOS METÁLICOS (CHATARRA)</option>
                                        <option value="512290">VENTA AL POR MAYOR DE HUEVOS, LECHE, ABARROTES, Y OTROS ALIMENTOS N.C.P.</option>
                                        <option value="513970">VENTA AL POR MAYOR DE INSTRUMENTOS CIENTÍFICOS Y QUIRÚRGICOS</option>
                                        <option value="514930">VENTA AL POR MAYOR DE INSUMOS VETERINARIOS</option>
                                        <option value="513951">VENTA AL POR MAYOR DE LIBROS</option>
                                        <option value="514310">VENTA AL POR MAYOR DE MADERA NO TRABAJADA Y PRODUCTOS RESULTANTES DE SU ELABORACIÓN PRIMARIA</option>
                                        <option value="515001">VENTA AL POR MAYOR DE MAQUINARIA AGRÍCOLA Y FORESTAL</option>
                                        <option value="515002">VENTA AL POR MAYOR DE MAQUINARIA METALÚRGICA</option>
                                        <option value="515004">VENTA AL POR MAYOR DE MAQUINARIA PARA LA CONSTRUCCIÓN</option>
                                        <option value="515005">VENTA AL POR MAYOR DE MAQUINARIA PARA LA ELABORACIÓN DE ALIMENTOS, BEBIDAS Y TABACO</option>
                                        <option value="515003">VENTA AL POR MAYOR DE MAQUINARIA PARA LA MINERÍA</option>
                                        <option value="515006">VENTA AL POR MAYOR DE MAQUINARIA PARA TEXTILES Y CUEROS</option>
                                        <option value="515008">VENTA AL POR MAYOR DE MAQUINARIA Y EQUIPO DE TRANSPORTE EXCEPTO VEHÍCULOS AUTOMOTORES</option>
                                        <option value="515009">VENTA AL POR MAYOR DE MAQUINARIA, HERRAMIENTAS, EQUIPO Y MATERIALES N.C.P.</option>
                                        <option value="515007">VENTA AL POR MAYOR DE MÁQUINAS Y EQUIPOS DE OFICINA</option>
                                        <option value="514320">VENTA AL POR MAYOR DE MATERIALES DE CONSTRUCCIÓN, ARTÍCULOS DE FERRETERÍA Y RELACIONADOS</option>
                                        <option value="512130">VENTA AL POR MAYOR DE MATERIAS PRIMAS AGRÍCOLAS</option>
                                        <option value="514200">VENTA AL POR MAYOR DE METALES Y MINERALES METALÍFEROS</option>
                                        <option value="513910">VENTA AL POR MAYOR DE MUEBLES</option>
                                        <option value="513990">VENTA AL POR MAYOR DE OTROS ENSERES DOMÉSTICOS N.C.P.</option>
                                        <option value="514990">VENTA AL POR MAYOR DE OTROS PRODUCTOS INTERMEDIOS, DESPERDICIOS Y DESECHOS N.C.P.</option>
                                        <option value="519000">VENTA AL POR MAYOR DE OTROS PRODUCTOS N.C.P.</option>
                                        <option value="513940">VENTA AL POR MAYOR DE PAPEL Y CARTÓN</option>
                                        <option value="514140">VENTA AL POR MAYOR DE PRODUCTOS CONEXOS A LOS COMBUSTIBLES</option>
                                        <option value="513960">VENTA AL POR MAYOR DE PRODUCTOS FARMACEUTICOS</option>
                                        <option value="512120">VENTA AL POR MAYOR DE PRODUCTOS PECUARIOS (LANAS, PIELES, CUEROS SIN PROCESAR)</option>
                                        <option value="514910">VENTA AL POR MAYOR DE PRODUCTOS QUÍMICOS</option>
                                        <option value="513100">VENTA AL POR MAYOR DE PRODUCTOS TEXTILES, PRENDAS DE VESTIR Y CALZADO</option>
                                        <option value="513952">VENTA AL POR MAYOR DE REVISTAS Y PERIÓDICOS</option>
                                        <option value="512260">VENTA AL POR MAYOR DE TABACO Y PRODUCTOS DERIVADOS</option>
                                        <option value="501010">VENTA AL POR MAYOR DE VEHÍCULOS AUTOMOTORES (IMPORTACIÓN, DISTRIBUCIÓN) EXCEPTO MOTOCICLETAS</option>
                                        <option value="525930">VENTA AL POR MENOR A CAMBIO DE UNA RETRIBUCIÓN O POR CONTRATA</option>
                                        <option value="522060">VENTA AL POR MENOR DE ALIMENTOS PARA MASCOTAS Y ANIMALES EN GENERAL</option>
                                        <option value="523390">VENTA AL POR MENOR DE APARATOS, ARTÍCULOS, EQUIPO DE USO DOMÉSTICO N.C.P.</option>
                                        <option value="523410">VENTA AL POR MENOR DE ARTÍCULOS DE FERRETERÍA Y MATERIALES DE CONSTRUCCIÓN</option>
                                        <option value="523140">VENTA AL POR MENOR DE ARTÍCULOS DE TOCADOR Y COSMÉTICOS</option>
                                        <option value="523310">VENTA AL POR MENOR DE ARTÍCULOS ELECTRODOMÉSTICOS Y ELECTRÓNICOS PARA EL HOGAR</option>
                                        <option value="523130">VENTA AL POR MENOR DE ARTÍCULOS ORTOPÉDICOS</option>
                                        <option value="522070">VENTA AL POR MENOR DE AVES Y HUEVOS</option>
                                        <option value="522010">VENTA AL POR MENOR DE BEBIDAS Y LICORES (BOTILLERÍAS)</option>
                                        <option value="523210">VENTA AL POR MENOR DE CALZADO</option>
                                        <option value="523969">VENTA AL POR MENOR DE CARBÓN, LENA Y OTROS COMBUSTIBLES DE USO DOMÉSTICO</option>
                                        <option value="522020">VENTA AL POR MENOR DE CARNES (ROJAS, BLANCAS, OTRAS) PRODUCTOS CÁRNICOS Y SIMILARES</option>
                                        <option value="505000">VENTA AL POR MENOR DE COMBUSTIBLE PARA AUTOMOTORES</option>
                                        <option value="523320">VENTA AL POR MENOR DE CRISTALES, LOZAS, PORCELANA, MENAJE (CRISTALERÍAS)</option>
                                        <option value="523350">VENTA AL POR MENOR DE DISCOS, CASSETTES, DVD Y VIDEOS</option>
                                        <option value="523992">VENTA AL POR MENOR DE FLORES, PLANTAS, ÁRBOLES, SEMILLAS, ABONOS</option>
                                        <option value="523961">VENTA AL POR MENOR DE GAS LICUADO EN BOMBONAS</option>
                                        <option value="523340">VENTA AL POR MENOR DE INSTRUMENTOS MUSICALES (CASA DE MÚSICA)</option>
                                        <option value="523360">VENTA AL POR MENOR DE LÁMPARAS, APLIQUÉS Y SIMILARES</option>
                                        <option value="523230">VENTA AL POR MENOR DE LANAS, HILOS Y SIMILARES</option>
                                        <option value="523240">VENTA AL POR MENOR DE MALETERÍAS, TALABARTERÍAS Y ARTÍCULOS DE CUERO</option>
                                        <option value="523993">VENTA AL POR MENOR DE MASCOTAS Y ACCESORIOS</option>
                                        <option value="523330">VENTA AL POR MENOR DE MUEBLES</option>
                                        <option value="521900">VENTA AL POR MENOR DE OTROS PRODUCTOS EN PEQUENOS ALMACENES NO ESPECIALIZADOS</option>
                                        <option value="522040">VENTA AL POR MENOR DE PESCADOS, MARISCOS Y PRODUCTOS CONEXOS</option>
                                        <option value="523420">VENTA AL POR MENOR DE PINTURAS, BARNICES Y LACAS</option>
                                        <option value="523220">VENTA AL POR MENOR DE PRENDAS DE VESTIR EN GENERAL, INCLUYE ACCESORIOS</option>
                                        <option value="522090">VENTA AL POR MENOR DE PRODUCTOS DE CONFITERÍAS, CIGARRILLOS, Y OTROS</option>
                                        <option value="522050">VENTA AL POR MENOR DE PRODUCTOS DE PANADERÍA Y PASTELERÍA</option>
                                        <option value="523120">VENTA AL POR MENOR DE PRODUCTOS MEDICINALES</option>
                                        <option value="523250">VENTA AL POR MENOR DE ROPA INTERIOR Y PRENDAS DE USO PERSONAL</option>
                                        <option value="525110">VENTA AL POR MENOR EN EMPRESAS DE VENTA A DISTANCIA POR CORREO</option>
                                        <option value="525130">VENTA AL POR MENOR EN EMPRESAS DE VENTA A DISTANCIA VÍA INTERNET</option>
                                        <option value="525120">VENTA AL POR MENOR EN EMPRESAS DE VENTA A DISTANCIA VÍA TELEFÓNICA</option>
                                        <option value="525200">VENTA AL POR MENOR EN PUESTOS DE VENTA Y MERCADOS</option>
                                        <option value="525919">VENTA AL POR MENOR NO REALIZADA EN ALMACENES DE PRODUCTOS PROPIOS N.C.P.</option>
                                        <option value="525911">VENTA AL POR MENOR REALIZADA POR INDEPENDIENTES EN TRANSPORTE PÚBLICO (LEY 20.388)</option>
                                        <option value="504010">VENTA DE MOTOCICLETAS</option>
                                        <option value="503000">VENTA DE PARTES, PIEZAS Y ACCESORIOS DE VEHÍCULOS AUTOMOTORES</option>
                                        <option value="504020">VENTA DE PIEZAS Y ACCESORIOS DE MOTOCICLETAS</option>
                                        <option value="501020">VENTA O COMPRAVENTA AL POR MENOR DE VEHÍCULOS AUTOMOTORES NUEVOS O USADOS</option>
                                        <option value="523999">VENTAS AL POR MENOR DE OTROS PRODUCTOS EN ALMACENES ESPECIALIZADOS N.C.P.</option>
                                        <option value="0">Ninguno/Privado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    <label>Contraseña <em style="font-size: 0.7em;">Entre 6 y 20 caracteres alfanuméricos</em></label>
                                    <!-- <input class="u-full-width" type="password"> -->
                                    <?php echo $this->Form->input('p4ss', array("type" => "password", "class" => "u-full-width noccp")); ?>
                                </div>
                                <div class="six columns">
                                    <label>Repetir Contraseña</label>
                                    <!-- <input class="u-full-width" type="password"> -->
                                    <?php echo $this->Form->input('p4ss2', array("type" => "password", "class" => "u-full-width noccp")); ?>
                                </div>
                            </div>
                        <?php } ?>
                            <div class="row">
                                <div class="six columns">
                                    <label>Dirección</label>
                                    <?php echo $this->Form->input('address', array("class" => "u-full-width", "placeholder" => 'Calle Nº, Villa Población')); ?>
                                </div>
                                <div class="six columns">
                                    <label>Mail</label>
                                    <?php echo $this->Form->input('mail', array("type" => "text", "class" => "u-full-width noccp", "placeholder" => 'casilla@mail.cl')); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    <label>Región</label>
                                    <?php #echo $this->Form->input('region_id', array('options' => $regionesR, 'empty' => 'Selecciona', 'class' => 'u-full-width')); ?>
                                    <select name="data[Usuario][region_id]" class="u-full-width" id="UsuarioRegionId">
                                        <option value="">Selecciona</option>
                                        <?php foreach ($regionesR as $key => $region) { ?>
                                        <option value="<?php echo $region['id']; ?>"><?php echo utf8_encode($region['name']); ?></option>
                                        <?php } ?>
                                        
                                    </select>
                                </div>
                                <div class="six columns">
                                    <label>Confirma tu mail</label>
                                    <?php echo $this->Form->input('mailr', array("type" => "text", "class" => "u-full-width noccp", "placeholder" => 'casilla@mail.cl')); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="four columns">
                                    <label>Comuna</label>
                                    <?php
                                        echo $this->Form->input('comuna_id', array('empty' => 'Selecciona', 'class' => 'u-full-width'));
                                    ?>
                                </div>
                                <div class="two columns">
                                    <label>Cod.</label>
                                    <?php echo $this->Form->input(null, array('options' => array(
                                        "2" => "2",
                                        "32" => "32",
                                        "33" => "33",
                                        "34" => "34",
                                        "35" => "35",
                                        "39" => "39",
                                        "41" => "41",
                                        "42" => "42",
                                        "43" => "43",
                                        "45" => "45",
                                        "58" => "58",
                                        "57" => "57",
                                        "55" => "55",
                                        "51" => "51",
                                        "53" => "53",
                                        "63" => "63",
                                        "64" => "64",
                                        "65" => "65",
                                        "67" => "67",
                                        "61" => "61",
                                        "72" => "72",
                                        "71" => "71",
                                        "73" => "73",
                                        "75" => "75",
                                    ), 'empty' => '--', 'class' => 'u-full-width', 'name' => 'data[Usuario][cod]', 'id' => 'UsuarioCod')); ?>
                                </div>
                                <div class="three columns">
                                    <label>Fono <em style="font-size: 0.7em;">(Opcional)</em></label>
                                    <?php echo $this->Form->input('phone', array("type" => "text", "class" => "u-full-width", "placeholder" => '23349988', 'id' => 'UsuarioPhone')); ?>
                                </div>
                                <div class="three columns">
                                    <label>Teléfono móvil</label>
                                    <?php echo $this->Form->input('mobile', array("type" => "text", "class" => "u-full-width", "placeholder" => '91234567', 'id' => 'UsuarioMobile')); ?>
                                </div>
                            </div>
                            <!-- <input type="button" name="previous" class="previous action-button transparent" value="Paso anterior" />
                            <input type="button" name="next" class="next action-button step2" value="Siguiente paso" /> -->
                            <input type="button" name="next" class="next action-button boton-amarillo step1 disabled" value="Siguiente paso" />
                        </fieldset>
                        <fieldset>
                            <h3>Paso 2 · Datos de tu vehículo</h3>
                            <div class="base_car">
                                <div class="row">
                                    <div class="four columns">
                                        <?php echo $this->Form->input(null, array('options' => array(
                                                '1' => 'Patente Nacional', 
                                                '2' => 'Patente Moto', 
                                                '3' => 'extranjera / provisoria / fiscales'
                                            ), 'class' => 'u-full-width car_doc', 
                                                'name' => 'data[Usuario][car][1]', 'type' => 
                                                'select', 'id' => 'UsuarioTipoPatente_1',
                                                'onchange' => "tipopatente(this.value,'p','1');",
                                                'data-id-plate' => '1')); ?>
                                    </div>
                                    <div class="four columns">
                                        <input id="UsuarioPatente_1a" class="u-full-width car_id" name="data[Usuario][car_value][1a]" style="text-transform:uppercase;" type="text" placeholder="XX1234 / XXXX12" data-type="1" data-id-plate="1" />
                                        <input id="UsuarioPatente_1b" class="u-full-width car_id" name="data[Usuario][car_value][1b]" style="text-transform:uppercase; display:none;" type="text" placeholder="XXX12 / XX123" data-type="2" data-id-plate="1" />
                                        <input id="UsuarioPatente_1c" class="u-full-width car_id" name="data[Usuario][car_value][1c]" style="text-transform:uppercase; display:none;" type="text" placeholder="xxxxxx" data-type="3" data-id-plate="1" />
                                        <input id="UsuarioPatenteData_1" class="" name="data[Usuario][car_data][1]" type="hidden" />
                                    </div>
                                    <div class="four columns">
                                        <select name="data[Usuario][car_clase][1]" class="u-full-width car_clase" id="UsuarioClasePatente_1" data-id-plate="1">
                                            <option value="">Seleccione Clase</option>
                                        </select>
                                    </div>
                                    <div class="one columns">
                                        &nbsp;
                                    </div>
                                </div>    
                            </div>
                            
                            <?php for ($i=2; $i <= 10; $i++) { ?>
                            <div class="newOne_<?php echo $i; ?>" style="display:none;">
                                <div class="row">
                                    <div class="four columns">
                                        <?php echo $this->Form->input(null, array('options' => array(
                                                '1' => 'Patente Nacional', 
                                                '2' => 'Patente Moto', 
                                                '3' => 'extranjera / provisoria / fiscales'
                                            ), 'class' => 'u-full-width car_doc', 
                                                'name' => 'data[Usuario][car][' . $i . ']', 
                                                'type' => 'select', 'id' => 'UsuarioTipoPatente_' . $i,
                                                'onchange' => "tipopatente(this.value,'p','" . $i . "');",
                                                'data-id-plate' => $i)); ?>
                                    </div>
                                    <div class="four columns">
                                        <input id="UsuarioPatente_<?php echo $i; ?>a" class="u-full-width car_id" name="data[Usuario][car_value][<?php echo $i; ?>a]" style="text-transform:uppercase;" type="text" placeholder="XX1234 / XXXX12" data-type="1" data-id-plate="<?php echo $i; ?>" />
                                        <input id="UsuarioPatente_<?php echo $i; ?>b" class="u-full-width car_id" name="data[Usuario][car_value][<?php echo $i; ?>b]" style="text-transform:uppercase; display:none;" type="text" placeholder="XXX12 / XX123" data-type="2" data-id-plate="<?php echo $i; ?>" />
                                        <input id="UsuarioPatente_<?php echo $i; ?>c" class="u-full-width car_id" name="data[Usuario][car_value][<?php echo $i; ?>c]" style="text-transform:uppercase; display:none;" type="text" placeholder="xxxxxx" data-type="3" data-id-plate="<?php echo $i; ?>" />
                                        <input id="UsuarioPatenteData_<?php echo $i; ?>" class="" name="data[Usuario][car_data][<?php echo $i; ?>]" type="hidden" />
                                    </div>
                                    <div class="four columns">
                                        <select name="data[Usuario][car_clase][<?php echo $i; ?>]" class="u-full-width car_clase" id="UsuarioClasePatente_<?php echo $i; ?>" data-id-plate="<?php echo $i; ?>">
                                            <option value="">Seleccione Clase</option>
                                        </select>
                                    </div>
                                    <div class="one columns">
                                        <a href="" class="hide_plate" data-idplate="<?php echo $i; ?>">X</a>
                                    </div>
                                </div> 
                            </div>
                            <?php } ?>
                            <div class="row text-left">
                                <a href="#" id="addOne">+ Agregar otra patente</a>
                            </div>

                            <input type="button" name="previous" class="prev previous action-button transparent" value="Paso anterior" />
                            <input type="button" name="next" class="next action-button step3 disabled" value="Siguiente paso" />
                        </fieldset>
                        <fieldset>
                            <h3>Paso 3 · Formas de pago</h3>
                            <section class="tablas">
                                <section class="tabla-1 three columns lift plan-tier state-selected" id="addPAC">
                                  <div class="inner-table">
                                    <h4 class="color-1">PAC</h4>
                                    <p>Pago Automático con Cargo a Cuenta Bancaria</p>
                                    <a class="button boton-gris" href="#">Seleccionar</a>
                                  </div>
                                </section>
                                <section class="six columns lift plan-tier callout state-selected" id="addSER">
                                    <h6>RECOMENDADO</h6>
                                    <div class="inner-table">
                                      <h4>SERVIPAG</h4>
                                      <p>Pago a través de la red de sucursales de SERVIPAG o en www.servipag.cl</p>
                                      <a class="button button-primary" href="#">Seleccionar</a>
                                      <p><strong>¡Habilitación inmediata!</strong></p>
                                      <p>Una vez completado correctamente el registro online</p>
                                    </div>
                                </section>
                                <section class="tabla-3 three columns column lift plan-tier state-selected" id="addPAT">
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
                                        <?php echo $this->Form->input('agree', array("type" => "checkbox", "value" => 1, "checked" => "checked")); ?>
                                        <span class="label-body">Acepto el envío de facturas por email</span>
                                    </label>
                                </div>
                            </div>

                            <input type="button" name="previous" class="previous action-button transparent" value="Paso anterior" />

                            <a href="" id="selectPay" class="button boton-amarillo">Aceptar</a>

                            <div id="popup">
                                <div class="container">
                                    <div class="row">
                                        <div class="eight columns offset-by-two text-center">
                                            <h3>Condiciones Generales y Operativas de Uso Sistema Electrónico de Cobro de Tarifas o Peajes</h3>
                                            <p>Descarga las Condiciones Generales y Operativas de Uso <?php echo $this->Html->link('aquí', '/app/webroot/Condiciones_Generales_y_Operativas.pdf', array('target' => '_blank', 'id' => 'downloadCGyO')); ?></p>
                                            <a href="" id="lastStep" class="button boton-amarillo">He leído y acepto las condiciones</a>
                                        </div>
                                        <!-- <div class="modal-body twelve columns" style="height: 300px; overflow-y: auto; text-align: justify;">
                                            <p>ARTÍCULO SEGUNDO: NORMATIVA APLICABLE.</p>
                                            <p>&nbsp;</p>
                                            <p>A. Legislación sobre tarificación vial.</p>
                                            <p>&nbsp;</p>
                                            <p>El Artículo 75 del DFL MOP N° 850, de 1997, que fija el texto refundido, coordinado y sistematizado de la Ley Orgánica del MOP y de la Ley de Caminos, establece la facultad del Presidente de la República para establecer peajes en los caminos, puentes y túneles.</p>
                                            <p>El Artículo 87 del mismo cuerpo legal señala, como uno de los instrumentos con que cuenta el MOP para el cumplimiento de sus funciones de planeamiento, estudio, proyección, construcción, ampliación, reparación, conservación y explotación de las obras públicas fiscales, celebrar un contrato adjudicado en licitación pública nacional o internacional, a cambio de la concesión temporal de su explotación, el que se regirá por las normas dispuestas en el DS MOP N° 900, de 1996, Ley de Concesiones de Obras Públicas, y su reglamento (DS MOP N° 956, de 1997).</p>
                                            <p>Se deja constancia que, salvo en lo referente al cobro de tarifas impagas y al régimen de multas por no pago de éstas, no es aplicable a Ruta del Maipo Sociedad Concesionaria S.A. (la “Sociedad Concesionaria”) la Ley Nº 20.410, al no haberse acogido ella al nuevo régimen legal conforme a su articulado transitorio. Por tanto, cualquier mención que se haga en el presente documento a la Ley de Concesiones de Obras Públicas debe entenderse hecha al DS MOP Nº 900, de 1996, previo a la modificación introducida por la Ley 20.410.</p>
                                            <p>El Artículo 11 de la Ley de Concesiones prescribe que “El concesionario percibirá como única compensación por los servicios que preste, el precio, tarifa o subsidio convenidos y los otros beneficios adicionales expresamente estipulados.”.</p>
                                            <p>Conforme al Artículo 42 de la Ley de Concesiones, cuando un Usuario de una obra concesionada - cuente o no con un Sistema Electrónico de Cobro de Tarifas o Peajes - no pague su tarifa o peaje, la Concesionaria podrá cobrarla judicialmente, de acuerdo al procedimiento establecido en la Ley N° 18.287, siendo competente el Juez de Policía Local del territorio del domicilio del Cliente.</p>
                                            <p>&nbsp;</p>
                                            <p>B. Sistema Electrónico de Cobro de Tarifas de Peajes.</p>
                                            <p>&nbsp;</p>
                                            <p>Ruta del Maipo Sociedad Concesionaria S.A. implementó para la “Concesión Internacional Ruta 5, Tramo Santiago-Talca y Acceso Sur a Santiago”, que comprende desde el Km. 29,014 al Km. 219,490 de la Ruta 5 Sur, un Sistema Electrónico de Cobro de Tarifas o Peajes (el “Proyecto”) mediante el cual se realizará una transacción electrónica por cada pasada del vehículo por los puntos de cobro de cada Plaza de Peaje Troncal o Lateral que se habiliten al efecto, transacción que deberá ser pagada por toda persona natural o jurídica que suscriba un “Convenio de Pago” para uso de la infraestructura del Sistema Electrónico de Cobro de Tarifas o Peajes de la Concesión (“Usuario”).</p>
                                            <p>Las Tarifas serán informadas por la Sociedad Concesionaria, de acuerdo a las normas del Contrato de Concesión, a través de medios de prensa escritos y letreros en los lugares aprobados por el Inspector Fiscal y se encontrarán a disposición del Usuario en la forma establecida en el artículo cuarto de las presentes Condiciones Generales.</p>
                                            <p>Dicho sistema permitirá a los vehículos provistos de un dispositivo TAG habilitado circular por las Vías Dedicadas o Mixtas de Telepeaje de Plazas de Peaje de la Concesión, siempre que se cumplan las condiciones señaladas en las presentes Condiciones Generales y Operativas.</p>
                                            <p>&nbsp;</p>
                                            <p>C. Sistema Interoperable.</p>
                                            <p>&nbsp;</p>
                                            <p>Existe un Sistema Interoperable que permite a los Usuarios utilizar su dispositivo TAG en todas aquellas vías o servicios que utilicen el Sistema Electrónico de Cobro de Tarifas o Peajes, es decir, cada Usuario con su dispositivo TAG está autorizado para transitar por todas las vías concesionadas u otros servicios autorizados que utilicen este sistema de cobro. Sin embargo, será cada Sociedad Concesionaria o prestadora de servicios, la que emita el documento de cobro correspondiente al uso de su tramo concesionado en forma independiente una de otra.</p>
                                            <p>Actualmente forman parte del Sistema Interoperable los siguientes contratos de concesión: a) Sistema Oriente – Poniente, cuya Concesionaria se denomina “Sociedad Concesionaria Costanera Norte S.A.”; b) Sistema Norte – Sur, cuya Concesionaria se denomina “Sociedad Concesionaria Autopista Central S.A.”; c) Sistema Américo Vespucio Nor - Poniente, Av. El Salto - Ruta 78, cuya Concesionaria se denomina “Sociedad Concesionaria Vespucio Norte Express S.A.”; d) Sistema Américo Vespucio Sur, Ruta 78 - Av. Grecia, cuya Concesionaria se denomina “Sociedad Concesionaria Autopista Vespucio Sur S.A.”; e) Acceso Vial a Aeropuerto Arturo Merino Benítez, cuya Concesionaria se denomina “Sociedad Concesionaria AMB S.A.”, f) Concesión Variante Vespucio – El Salto – Kennedy, cuya Concesionaria se denomina “Sociedad Concesionaria Túnel San Cristóbal S.A.”, y g) Concesión Internacional Ruta 5 Tramo Santiago Talca y Acceso Sur a Santiago, cuya Concesionaria se denomina “Ruta del Maipo Sociedad Concesionaria S.A.”. La incorporación futura de nuevos Contratos de Concesión u otros Servicios al Sistema Interoperable será comunicada por el MOP a la Sociedad Concesionaria, a objeto que tal situación sea debida y oportunamente informada a sus Usuarios.</p>
                                            <p>&nbsp;</p>
                                            <p>D. Legislación de la Ley de Tránsito relativa al Sistema Electrónico de Cobro de Tarifas o Peajes.</p>
                                            <p>&nbsp;</p>
                                            <p>Conforme al Artículo 114 de la Ley N° 18.290, Ley del Tránsito, y al Artículo 1 de su Reglamento, en los caminos públicos en que opere un Sistema Electrónico de Cobro de Tarifas o Peajes, sólo podrán circular los vehículos que estén provistos de un dispositivo electrónico habilitado (TAG) u otro sistema complementario que permita su cobro. La infracción a esta prohibición será sancionada según lo dispuesto en el Artículo 200 N° 7 del mismo texto legal (no respetar los signos y demás señales que rigen el tránsito público), como infracción o contravención grave, mediante la aplicación de la multa respectiva. Para que los Usuarios puedan cumplir con la obligación anteriormente señalada, la Concesionaria dispondrá de la señalética adecuada en las vías de acceso y de salida de la ruta concesionada.</p>
                                            <p>Ruta del Maipo Sociedad Concesionaria S.A. no está habilitada ni autorizada para aceptar el sistema complementario de cobro actualmente aprobado por el MOP denominado Pase Diario Único o Interoperable, por lo que los Usuarios que deseen utilizar el Sistema Electrónico de Cobro de Tarifas o Peajes deberán contar con un TAG habilitado.</p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <div class="row text-center color-0">
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

    <!-- Begin modal pat -->
    <div id="pat-option" style="display:none;">
        <div class="modal_pat">
            <div class="container">
                <div class="row">
                    <div class="eight columns offset-by-two modal-head">
                        <fieldset>
                            <h3>Ingresa los datos de tu tarjeta de crédito</h3>
                            <div class="row">
                                <div class="six columns">
                                    <label>Banco</label>
                                    <select name="tac_bancodestino" class="u-full-width tac_bancodestino__s">
                                        <option value="">Seleccione un banco</option>
                                        <option value="BCOCHILE EDWARDS">BANCO DE CHILE - EDWARDS</option>
                                        <option value="INTERNACIONAL">BANCO INTERNACIONAL</option>
                                        <option value="BANCOESTADO">BANCO DEL ESTADO DE CHILE</option>
                                        <option value="SCOTIABANK">SCOTIABANK (Y EX DESARROLLO)</option>
                                        <option value="BCI">BCI (BCO DE CREDITO E INV)</option>
                                        <option value="BANCO DO BRASIL">BANCO DO BRASIL S.A.</option>
                                        <option value="CORPBANCA">CORPBANCA</option>
                                        <option value="BICE">BANCO BICE</option>
                                        <option value="HSBC BANK">HSBC BANK</option>
                                        <option value="SANTANDER">BANCO SANTANDER</option>
                                        <option value="ITAU">BANCO ITAU CHILE</option>
                                        <option value="SECURITY">BANCO SECURITY</option>
                                        <option value="FALABELLA">BANCO FALABELLA</option>
                                        <option value="RIPLEY">BANCO RIPLEY</option>
                                        <option value="RABOBANK">RABOBANK</option>
                                        <option value="CONSORCIO">BANCO CONSORCIO</option>
                                        <option value="PARIS">BANCO PARIS</option>
                                        <option value="BBVA">BBVA (BCO BILBAO VIZCAYA ARG)</option>
                                    </select>
                                </div>
                                <div class="six columns">
                                    <label>Tipo de Tarjeta</label>
                                    <select name="tac_tarjeta" class="u-full-width tac_tarjeta__s">
                                        <option value="">Seleccione tipo tarjeta</option>
                                        <option value="1">Visa</option>
                                        <option value="2">Mastercard</option>
                                        <option value="3">American Express</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    <label>Nombre del Títular</label>
                                    <input name="tac_nombre" type="text" class="u-full-width tac_nombre__s" placeholder="Nombre del Títular" autocomplete="off" style="text-transform: uppercase !important;">
                                </div>
                                <div class="six columns">
                                    <label>RUT del Títular</label>
                                    <input name="tac_rut" type="text" class="u-full-width tac_rut__s" placeholder="RUT del Títular" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    <label>Número de Tarjeta, <small><a id="card_show__s" data-show="1" href="">Mostrar</a></small></label>
                                    <input type="password" maxlength="16" onkeypress="return isNumberKey(event);" autocomplete="off" class="u-full-width card_number_hidden card_number_hidden__s">
                                    
                                </div>
                                <div class="six columns">
                                    <label>Fecha de Vencimiento</label>
                                    <input type="text" class="u-full-width tac_end_date__s" placeholder="Ej: 01-2020" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="twelve columns">
                                    <p id="pat_parraf">Su PAT se activará una vez aprobado por la entidad financiera correspondiente.
                                    <br>No obstante, a partir de hoy Usted podrá comenzar a utilizar su(s) dispositivo(s) TAG(s) en Ruta del Maipo, una vez finalizada la suscripción.</p>
                                </div>
                            </div>
                            <input type="button" name="next" class="next action-button boton-amarillo save_card__s" value="Continuar" />
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin modal pat -->
    <div id="pac-option" style="display:none;">
        <div class="modal_pat">
            <div class="container">
                <div class="row">
                    <div class="row">
                        <div class="twelve columns">
                            <p>Su PAC se activará una vez aprobado por la entidad financiera correspondiente.
                            <br>No obstante, a partir de hoy Usted podrá comenzar a utilizar su(s) dispositivo(s) TAG(s) en Ruta del Maipo, una vez finalizada la suscripción.</p>
                        </div>
                    </div>
                    <input type="button" name="next" id="close_pac" class="next action-button boton-amarillo" value="Continuar" />
                </div>
            </div>
        </div>
    </div>
    <!-- End modal pac -->