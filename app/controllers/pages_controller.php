<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array('Html');

/**
 * Default components
 *
 * @var array
 * @access public
 */
	var $components = array('Email');

/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	var $uses = array('Usuario', 'Regione', 'Comuna', 'Vehiculo', 'Industrycode');


/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
	function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}

	function home() {
		$title = 'Home';
		$this->set(compact('title'));
	}

	function suscribe( $tipo = null ) {

		if ( $tipo  == null ) {
			$this->redirect("/");
		}

		$regione = $this->Regione->find('all');
		$regioneR = $this->Regione->find('list');
		if($regione) foreach($regione as $region){
				$arrDataR[] = array(
						"id" => $region["Regione"]["id"],
						"name" => $region["Regione"]["name"]
				);
		}

		$comuna = $this->Comuna->find('all');
		if($comuna) foreach($comuna as $comun){
				$arrDataC[] = array(
						"id" => $comun["Comuna"]["id"],
						"name" => utf8_encode( $comun["Comuna"]["name"] ),
						"region_id" => $comun["Comuna"]["region_id"]
				);
		}

		$this->set('regiones', $regione);
		// $this->set('regionesR', $regioneR);
		$this->set('regionesR', $arrDataR);
		$this->set('comunasArr', $arrDataC);
		// $this->set('industrycodes', $this->Industrycode->find('all', array(
		// 		'fields' => array('Industrycode.SIC', 'Industrycode.SICDesc')
		// 	)));
		$this->set('type', $tipo);

		$title = 'Registro';
		$this->set(compact('title'));
	}

	function gracias() {
		/*
		16020408-7
		BGFX57-7
		N° CUENTA	RUT	Patente	MP
		100003712	17342870-7	FRLY88	Servipag
		100002531	16254122-6	YGHR43	PAC
		100003408	17342870-7	GZDK73	Servipag
		100003666	7691718-3	BJVY90	PAT
		100003419	96666673-0	VF9958	Servipag
		100000348	96867620-2	ZN4704	PAC
		*/
		if ($this->data) {
			$cleanRut = strtoupper(str_replace(array("-", "."), array("", ""), $this->data['Usuario']['rut']));
			$cleanRutEmpresa = '';
			if ( isset( $this->data['Usuario']['rutlegal'] ) ) {
				$cleanRutEmpresa = strtoupper(str_replace(array("-", "."), array("", ""), $this->data['Usuario']['rutlegal']));
			}
			
			// if ( $this->Usuario->findByRut( $cleanRut ) ) {
			// 	$this->Session->setFlash('RUT registrado previamente.');
			// 	$this->redirect("/");
			// }

			$usuarioToSave = array(
					'who' => $this->data['Usuario']['who'],
					'paytype' => $this->data['Usuario']['paytype'],
					'first_name' => ( isset( $this->data['Usuario']['first_name'] ) ) ? $this->data['Usuario']['first_name'] : '',
					'last_name' => ( isset( $this->data['Usuario']['last_name'] ) ) ? $this->data['Usuario']['last_name'] : '',
					'razonsocial' => ( isset( $this->data['Usuario']['razonsocial'] ) ) ? $this->data['Usuario']['razonsocial'] : '',
					'giro' => ( isset( $this->data['Usuario']['giro'] ) ) ? $this->data['Usuario']['giro'] : '',
					'rut' => $cleanRut,
					'rutlegal' => $cleanRutEmpresa,
					'rep_name' => ( isset( $this->data['Usuario']['rep_name'] ) ) ? $this->data['Usuario']['rep_name'] : '',
					'rep_lastname' => ( isset( $this->data['Usuario']['rep_lastname'] ) ) ? $this->data['Usuario']['rep_lastname'] : '',
					'rep_matlastname' => ( isset( $this->data['Usuario']['rep_matlastname'] ) ) ? $this->data['Usuario']['rep_matlastname'] : '',
					'p4ss' => $this->data['Usuario']['p4ss'],
					'address' => $this->data['Usuario']['address'],
					'mail' => $this->data['Usuario']['mail'],
					'comuna_id' => $this->data['Usuario']['comuna_id'],
					'cod' => $this->data['Usuario']['cod'],
					'phone' => $this->data['phone'],
					'mobile' => $this->data['mobile'],
					'agree' => ($this->data['agree']) ? $this->data['agree'] : 0,
					'tac_bancodestino' => ($this->data['Usuario']['tac_bancodestino']) ? $this->data['Usuario']['tac_bancodestino'] : '',
					'tac_tarjeta' => ($this->data['Usuario']['tac_tarjeta']) ? $this->data['Usuario']['tac_tarjeta'] : '',
					'tac_nombre' => ($this->data['Usuario']['tac_nombre']) ? $this->data['Usuario']['tac_nombre'] : '',
					'tac_rut' => ($this->data['Usuario']['tac_rut']) ? $this->data['Usuario']['tac_rut'] : '',
					'tac_card_number' => ($this->data['Usuario']['tac_card_number']) ? $this->data['Usuario']['tac_card_number'] : '',
					'tac_end_date' => ($this->data['Usuario']['tac_end_date']) ? $this->data['Usuario']['tac_end_date'] : '',
					'created_at' => date('Y-m-d H:i:s')
				);

				$this->Usuario->save( $usuarioToSave );
				$newUserId = $this->Usuario->id;
				if ( $newUserId ) {
					$carDocTypes = $this->data['Usuario']['car'];
					$carDocValue = $this->data['Usuario']['car_value'];
					$carDataRNUT = $this->data['Usuario']['car_data'];
					$carInterClass = $this->data['Usuario']['car_clase'];

					if ( isset($carDocTypes) && !empty($carDocTypes)) {
						foreach ($carDocTypes as $key => $car) {
							if ($car == 1) $type_plate = 'a';
							if ($car == 2) $type_plate = 'b';
							if ($car == 3) $type_plate = 'c';

							if ( !empty($carDocValue[$key . $type_plate]) ) {
								$this->Vehiculo->create();
								$vehiculoToSave =  array(
										"car" => strtoupper( $carDocTypes[$key] ),
										"car_data" => $carDataRNUT[$key],
										"car_value" => strtoupper( $carDocValue[$key . $type_plate] ),
										"car_class" => $carInterClass[$key],
										"usuario_id" => $newUserId,
										"created_at" => date('Y-m-d H:i:s')
									);
								$vehiculoToSaveSoap[] = $vehiculoToSave;
								$this->Vehiculo->save( $vehiculoToSave );
							}
						}
					}
					
					#################################
					# Integración TollCRM
					#################################
					$responseSoap = $this->soapCreatAccount( $usuarioToSave, $vehiculoToSaveSoap );
					$p = xml_parser_create();
					xml_parse_into_struct($p, $responseSoap, $vals, $index);
					xml_parser_free($p);

					$idCreateAccount = null;
					if( $vals ) foreach ($vals as $key => $value) {
						if ( $value['tag'] == 'CREATEACCOUNTRESULT' ) {
							$idCreateAccount = $value['value'];
						}
					}

					if ( $idCreateAccount > 0 ) {
						#################################
						# Get account by RUT
						#################################	
						$accountNumber = '';		
						$XMLrequest = $this->xml_requesting_getaccount_by_rut( $cleanRut );
						$request = $this->soapBaseRequest('GetAccountByRut', $XMLrequest);

						if ( $request != "" && $request != null && $request != 'NULL' ) {
							$p = xml_parser_create();
							xml_parse_into_struct($p, $request, $vals, $index);
							xml_parser_free($p);
							if( $vals ) foreach ($vals as $key => $value) {
								if ( $value['tag'] == 'ACCOUNTNUMBER' ) {
									if ( $value['value'] != "") {
										$accountNumber = $value['value'];
									}
								}
							}
						}
						#Agregar array datos usuario
						$usuarioToSave['accountNumber'] = $accountNumber;
						

						##################################################################
						# Actualizar registro bas de datos con ID cuenta TollCRM
						##################################################################
						$this->Usuario->id = $newUserId;
						$this->Usuario->saveField("id_user_webfacade", $idCreateAccount);
						#Agregar array datos usuario
						$usuarioToSave['id_user_webfacade'] = $idCreateAccount;
						$usuarioToSave['newUserId'] = $newUserId;
						
						#################################
						# Create Web Access
						#################################
							$XMLrequestWA = $this->xml_requesting_create_webaccess( $usuarioToSave );
							$responseWA = $this->soapBaseRequest('CreateWebAccess', $XMLrequestWA);

						#################################
						# Add Legal Rep
						#################################
						if ( $usuarioToSave['who'] == 2 ) {
							$XMLrequest = $this->xml_requesting_GetContactByAccountId( $idCreateAccount );
							$responseGetContact = $this->soapBaseRequest('GetContactByAccountId', $XMLrequest);
							$p = xml_parser_create();
							xml_parse_into_struct($p, $responseGetContact, $valsGetCont, $indexGetCont);
							xml_parser_free($p);

							if( $valsGetCont ) foreach ($valsGetCont as $key => $valueContac) {
								if ( $valueContac['tag'] == 'PRIMARYADDRESSID' ) {
									$PrimaryAddressId = $valueContac['value'];
								}
							}
							$XMLrequestLegal = $this->xml_requesting_add_legal_rep( $usuarioToSave, $PrimaryAddressId );
							// echo $XMLrequestLegal; die('STOP');
							$requestLegal = $this->soapBaseRequest('AddLegalRep', $XMLrequestLegal);
							// echo $requestLegal;
							// die();
							
						}


						#################################
						# Enviar mail Bievenida
						#################################
						$this->_sendMailBienvenida( $usuarioToSave );
						
					} else {
						$this->Session->setFlash('Error al registrar sus datos en Webfacade, favor intentar nuevamente.');
						// $this->redirect("/");
						// exit();
					}
					#################################
					# Fin si es TollCRM
					#################################
					
				} else {
					$this->Session->setFlash('Error al registrar sus datos, favor intentar nuevamente.');
					$this->redirect("/");
					exit();
				}
		}
		$this->layout = 'default';
		$title = 'Gracias';
		$this->set(compact('title'));
	}

	function invitefriends() {
		if ($this->data) {
			if ( isset($this->data['Usuario']['mail']) && !empty($this->data['Usuario']['mail']) ) {
				$responseSmtp = $this->_sendMailInvitar( $this->data['Usuario']['mail'] );
			}
		}
		echo $responseSmtp;
		die();
	}

	function ruttoll() {
		#Para información de usuario.
		$dataUser = array();
		// echo json_encode( array("state" => 2, "data" => $dataUser) );
		// die();
		// echo json_encode( array("state" => 1, "data" => $dataUser) );
		// die();
		/*
		* Response 1: Rut Ok
		* Response 2: Rut ya registrado,usuario posee cuenta en TollCRM
		* Response 3: Rut no se encuentra en Base de Datos del RNUT, contacte al 600 252 5000
		* Response 4: Error envio parametros
		*/
		$response = 4;
		if ( isset($this->params['form']['rut']) && $this->params['form']['rut'] !== "" ) {
			#Limpiar y formatear RUT
			$rutValidate = $this->params['form']['rut'];
				$rutValidate = preg_replace("/[^A-Za-z0-9 ]/", '', $rutValidate);
				$dv = substr($rutValidate, -1);
				$digitos = substr($rutValidate, 0, -1);
			$cleanRut = $digitos . "-" . $dv;

			#################################
			# Valdiar RUT aplicar WS(RNUT)
			#################################			
			$XMLrequest = $this->xml_requesting_valida_rut( $cleanRut );
			$request = $this->soapBaseRequest('RutLookUp', $XMLrequest);

			#Respuesta por defecto ver "Response 3"
			$response = 3;
			$valid_getaccount = false;
			if ( $request != "" && $request != null && $request != 'NULL' ) {
				$p = xml_parser_create();
				xml_parse_into_struct($p, $request, $vals, $index);
				xml_parser_free($p);
				
				if( $vals ) foreach ($vals as $key => $value) {
					if ( $value['tag'] == 'NAME' ) {
						if ( isset( $value['value'] ) && $value['value'] != "") {
							#Info array data usuario
							$dataUser['name'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'PATERNALLASTNAME' ) {
						if ( isset($value['value']) && $value['value'] != "") {
							#Info array data usuario
							$dataUser['paternal_last_name'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'MATERNALLASTNAME' ) {
						if ( isset($value['value']) && $value['value'] != "") {
							#Info array data usuario
							$dataUser['maternal_last_name'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'STREETNUMBER' ) {
						if ( $value['value'] != "") {
							#Info array data usuario
							$dataUser['street_number'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'COMMUNA' ) {
						if ( $value['value'] != "") {
							#Info array data usuario
							$dataUser['comuna'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'STREET' ) {
						if ( $value['value'] != "") {
							#Info array data usuario
							$dataUser['street'] = $value['value'];
						}
					}
					//Empresa
					if ( $value['tag'] == 'BUSINESSNAME' ) {
						if ( isset($value['value']) && $value['value'] != "") {
							#Info array data usuario
							$dataUser['business_name'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'SECONDARYRUT' ) {
						if ( isset($value['value']) && $value['value'] != "") {
							#Info array data usuario
							$dataUser['rut_rep'] = $value['value'];
						}
					}
				}

				#Tiene información de RNUT, se puede buscar en TollCRM
				if ( count( $dataUser ) > 0 ) {
					$valid_getaccount = true;
				}
				#Respuesta ver "Response 1" por defecto, si falla alguna validación cambia estado.
				$response = 1;
				if ( $valid_getaccount == true ) {
					#Respuesta ver "Response 2"
					#$response = 2;
					#################################
					# Get account by RUT
					#################################			
					$XMLrequest = $this->xml_requesting_getaccount_by_rut( $cleanRut );
					$request = $this->soapBaseRequest('GetAccountByRut', $XMLrequest);

					if ( $request != "" && $request != null && $request != 'NULL' ) {
						$p = xml_parser_create();
						xml_parse_into_struct($p, $request, $vals, $index);
						xml_parser_free($p);
						if( $vals ) foreach ($vals as $key => $value) {
							if ( $value['tag'] == 'ACCOUNTNUMBER' ) {
								if ( $value['value'] != "") {
									#Respuesta ver "Response 2"
									$response = 2;
								}
							}
						}
					}

					if ( $response == 1 && isset( $dataUser['comuna'] ) ) {
						#Obtenemos la comuna para actualizar selector
						$comunaRes = $this->Comuna->findByCountyname( $dataUser['comuna'] );
						$dataUser['comuna_id'] = $comunaRes['Comuna']['id'];
						$dataUser['region_id'] = $comunaRes['Regione']['id'];
					}
				} else {
					#Respuesta por defecto ver "Response 3"
					$response = 3;
				}
				
			}
		}

		echo json_encode( array("state" => $response, "data" => $dataUser) );
		die();
	}

	function platetoll() {
		#Para información de patente.
		$dataPlate = array(
				'tag_externalid' => '',
				'tag_consecion' => '',
				'make_id' => 545,#Por defecto deja Other Makes
				'model' => '',
				'year' => '',
				'inter_urban_class' => '',
				'urban_class' => '',
				'color' => '',
			);
		
		
		// echo json_encode( array("state" => 1, "data" => $dataPlate) );
		// die();
		/*
		* Recordar que este campo debe estar integrado con TollCrm para la validación de 
		* Response 0: “PPU OK”, 
		* Response 1: “PPU ya registrado”, 
		* Response 2: “PPU no pertenece al titular de la cuenta” 
		* Response 3: “PPU no se encuentra en Base de Datos del RNUT, contáctese al 600 252 5000”. 
			Para tales caso, sistema no debe permitir concretar la suscripción. Debe aparecer mensaje de contactar a la concesionaria.
		* Response 4: Error envio parametros
		*/
		$response = 4;
		if ( isset($this->params['form']['rut']) && $this->params['form']['rut'] !== "" && isset($this->params['form']['plate']) && $this->params['form']['plate'] !== "" ) {
			#Limpiar y formatear RUT
			$rutValidate = $this->params['form']['rut'];
				$rutValidate = preg_replace("/[^A-Za-z0-9 ]/", '', $rutValidate);
				$dv = substr($rutValidate, -1);
				$digitos = substr($rutValidate, 0, -1);
			$cleanRut = $digitos . "-" . $dv;

			#Limpiar y formatear patente
			$plateValidate = $this->params['form']['plate'];
				$plateValidate = preg_replace("/[^A-Za-z0-9 ]/", '', $plateValidate);
			// 	$dv = substr($plateValidate, -1);
			// 	$plate_digitos = substr($plateValidate, 0, -1);
			// $cleanPlate = $digitos . "-" . $dv;
			$cleanPlate = $plateValidate;

			#Si es patente moto agrega 0 despúes de las letras
			$plateType = $this->params['form']['plate_type'];
			if ( $plateType == '2' ) {
				$thirdDigitPlate = substr($cleanPlate, 2, 1);
				if ( is_numeric( $thirdDigitPlate ) )
					$posZero = 2;
				else
					$posZero = 3;

				$cleanPlate = substr_replace($cleanPlate, '0', $posZero, 0);
			}

			#################################
			# Valdiar RUT y Patente aplicar WS
			#################################			
			$XMLrequest = $this->xml_requesting_valida_patent( $cleanPlate );
			$request = $this->soapBaseRequest('RNUTPlateLookUp', $XMLrequest);
			/*$request = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><RNUTPlateLookUpResponse xmlns="http://tempuri.org/"><RNUTPlateLookUpResult><RnutVehicle><CheckDigit>52</CheckDigit><Make>MITSUBISHI</Make><Model>L200 KATANA</Model><Year>2014</Year><InterurbanClass>0</InterurbanClass><UrbanClass>1</UrbanClass><Color>GRIS</Color><Active>1</Active><LastUpdate>2014-01-29T04:02:01</LastUpdate><InactiveDate>0001-01-01T00:00:00</InactiveDate><TagIssuerId>4</TagIssuerId><TagIssuerName>Vespucio Norte</TagIssuerName><TagExternalId>53170042187</TagExternalId><OwnerRutNumber>76236446-8</OwnerRutNumber><EntityRoleId>1</EntityRoleId></RnutVehicle><RnutVehicle><CheckDigit>52</CheckDigit><Make>MITSUBISHI</Make><Model>L200 KATANA</Model><Year>2014</Year><InterurbanClass>0</InterurbanClass><UrbanClass>1</UrbanClass><Color>GRIS</Color><Active>1</Active><LastUpdate>2014-01-29T04:02:01</LastUpdate><InactiveDate>0001-01-01T00:00:00</InactiveDate><TagIssuerId>4</TagIssuerId><TagIssuerName>Vespucio Norte</TagIssuerName><TagExternalId>53170042187</TagExternalId><OwnerRutNumber>9879995-8</OwnerRutNumber><EntityRoleId>2</EntityRoleId></RnutVehicle></RNUTPlateLookUpResult></RNUTPlateLookUpResponse></soap:Body></soap:Envelope>';*/

			#Respuesta por defecto ver linea 229 "Response 3"
			$response = 3;
			if ( $request != "" && $request != null && $request != 'NULL' ) {
				$p = xml_parser_create();
				xml_parse_into_struct($p, $request, $vals, $index);
				xml_parser_free($p);

				#Loop para extraer información de vehículo
				$rut_owner = array();
				if( $vals ) foreach ($vals as $key => $value) {
					if ( $value['tag'] == 'OWNERRUTNUMBER' ) {
						if ( isset( $value['value'] ) && $value['value'] != "") {
							$rut_owner[] = $value['value'];
						}
					}
					if ( $value['tag'] == 'TAGEXTERNALID' ) {
						if ( isset( $value['value'] ) && $value['value'] != "") {
							$dataPlate['tag_externalid'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'TAGISSUERNAME' ) {
						if ( isset( $value['value'] ) && $value['value'] != "") {
							$dataPlate['tag_consecion'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'MAKE' ) {
						if ( isset( $value['value'] ) && $value['value'] != "") {
							$dataPlate['make_id'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'MAKE' ) {
						if ( isset( $value['value'] ) && $value['value'] != "") {
							$makeMatch = '';
							$tmpMake = preg_replace("/[^A-Za-z0-9 ]/", '', $value['value']);

							foreach ($this->vehicles_makes_all as $key => $make) {
								if ( strtoupper( $make['name'] ) == $tmpMake ) {
									$makeMatch = $make['id'];
								}
							}

							if ( $makeMatch !== '' )
								$dataPlate['make_id'] = $makeMatch;
							
						}
					}
					if ( $value['tag'] == 'MODEL' ) {
						if ( isset( $value['value'] ) && $value['value'] != "") {
							$dataPlate['model'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'YEAR' ) {
						if ( isset( $value['value'] ) && $value['value'] != "") {
							$dataPlate['year'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'INTERURBANCLASS' ) {
						if ( isset( $value['value'] ) && $value['value'] != "") {
							$dataPlate['inter_urban_class'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'URBANCLASS' ) {
						if ( isset( $value['value'] ) && $value['value'] != "") {
							$dataPlate['urban_class'] = $value['value'];
						}
					}
					if ( $value['tag'] == 'COLOR' ) {
						if ( isset( $value['value'] ) && $value['value'] != "") {
							$dataPlate['color'] = $value['value'];
						}
					}
				}
				
				if ( in_array($cleanRut, $rut_owner)  ) {
					$response = 0;
					// Loop $this->vehicles_makes_all;
				} else {
					$response = 2;
				}
			}
		}
		

		echo json_encode( array( "state" => $response, "data" => serialize( $dataPlate ), "urban_class" => $dataPlate['urban_class'] ) );
		die();
	}

	function soapCreatAccount( $userData, $vehiclesdata ) {
		$this->layout = 'ajax';
		$XMLrequest = $this->xml_requesting_create_account( $userData, $vehiclesdata );
		$request = $this->soapBaseRequest('CreateAccount', $XMLrequest);
		
		return $request;
	}

	function soapBaseRequest($methodSoap, $XMLrequest) {
		// Create new SOAP client
		$wsdl = 'http://192.168.2.116:85/FacadeWebService.asmx?WSDL';
		$client = new anotherSoapClient($wsdl, array(
				'cache_wsdl'    => WSDL_CACHE_NONE, 
				'cache_ttl'     => 86400, 
				'trace'         => true,
				'exceptions'    => true,
		));
		try {
			$request = $client->__anotherRequest($methodSoap, $XMLrequest);

			return $request;
		} catch (SoapFault $e ){
			return "Last request:<pre>" . htmlentities($client->__getLastRequest()) . "</pre>";
		}
	}

	function xml_requesting_create_account( $userData, $vehiclesdata ) {
		$cleanRut = strtoupper( str_replace( array("-", "."), array("", ""), $userData['rut'] ) );
			$dv = substr($cleanRut, -1);
			$rut = substr($cleanRut, 0, -1);
			$rutWefacade = $rut . "-" . $dv;

		$AccountTypeId = ( $userData['who'] == 1 ) ? 'PERSONAL' : 'BUSINESS';
		$CustomerType = ( $userData['who'] == 1 ) ? 1 : 2;
		
		#Metodos de pago
		$PaymentType = 'SERVIPAG';
		$ServipagPriority = 1;
		$paymentMeans = '';
		if ( $userData['paytype'] == 'PAT' ) {
			$RebillMethodId = 'CREDIT_CARD';
			$rebillMethod = 0;
			$PaymentType = 'CARD';
			//Datos tarjeta credito
			$CardDisplayCharacters = substr($userData['tac_card_number'], -4);
			$CardholderName = $userData['tac_nombre'];
			$CardNumber = $userData['tac_card_number'];
			$CardTypeId = $userData['tac_tarjeta'];
			$CardBankName = $userData['tac_bancodestino'];

			$cleanRutTac = strtoupper( str_replace( array("-", "."), array("", ""), $userData['tac_rut'] ) );
				$dvTac = substr($cleanRutTac, -1);
				$rutTac = substr($cleanRutTac, 0, -1);
				$NIDCard = $rutTac . "-" . $dvTac;

			$tmpExpirationDate = explode('-', $userData['tac_end_date']);
			$ExpirationMonth = $tmpExpirationDate[0];
			$ExpirationYear = $tmpExpirationDate[1];
			$paymentMeans = '<tem:paymentMeans xsi:type="Card">
								<tem:Id>0</tem:Id>
								<tem:CreatedDate xsi:nil="true" />
						        <tem:LastUpdatedDate xsi:nil="true" />
								<tem:IsDirty>false</tem:IsDirty>
								<tem:AccountId>0</tem:AccountId>
								<tem:CardStatusId>ACTIVE</tem:CardStatusId>
								<tem:CardholderName>' . $CardholderName . '</tem:CardholderName>
								<tem:CardNumber>' . $CardNumber . '</tem:CardNumber>
								<tem:CardPriority>1</tem:CardPriority>
								<tem:CardTypeId>' . $CardTypeId . '</tem:CardTypeId>
								<tem:ExpirationMonth>' . $ExpirationMonth . '</tem:ExpirationMonth>
								<tem:ExpirationYear>' . $ExpirationYear . '</tem:ExpirationYear>
								<tem:PaymentTypeId>CARD</tem:PaymentTypeId>
								<tem:CardBankName>' . $CardBankName . '</tem:CardBankName>
								<tem:NID>' . $NIDCard .'</tem:NID>
								<tem:RebillRetryCnt>0</tem:RebillRetryCnt>
							 </tem:paymentMeans>';
		} elseif ( $userData['paytype'] == 'PAC' ) {
			$RebillMethodId = 'SERVIPAG';
			$rebillMethod = 0;
			$ServipagPriority = 2;
		} else {
			$RebillMethodId = 'SERVIPAG';
			$rebillMethod = 0;
		}
		
		$comunaRegion = $this->Comuna->find('all', array(
				'conditions' => array('Comuna.id' => $userData['comuna_id'])
			));
		
		$comunaRegion = $comunaRegion[0];
		
		$City = $comunaRegion['Comuna']['countyname'];
		$CountyCode = $comunaRegion['Comuna']['countycode'];
		$StateProvinceCode = $comunaRegion['Comuna']['stateprovincecode'];
		$Province = $comunaRegion['Comuna']['province'];
		$LicensePlateCountry = $comunaRegion['Comuna']['countrycode'];
		$CountryCode = $comunaRegion['Comuna']['countrycode'];
		
		//Para Correspondencia
		$ContactMethod = 2;

		//Para envio de factura
		$StatementMethod = ( $userData['agree'] == 1 ) ? 2 : 1;

		$BusinessTypeId = 'NA';
		$OrganizationTypeId = 'PrivatelyOwned';
		$CompanyName = '';
		$CompanyRegistrationNumber = '';
		$SecondaryNID = '';
		$IndustryCode = '';
		$NIDAddress = '';
		$FirstName = ( $userData['who'] == 1 ) ? $userData['first_name'] : $userData['rep_name'];
		$LastName =  ( $userData['who'] == 1 ) ? $userData['last_name'] : $userData['rep_lastname'];

		//Ultimos 4 digitos RUT para respuesta pregunta secreta
		$tmpRut = substr($cleanRut, -5);
		$SecurityAnswer = substr($tmpRut, 0, 4);
		//ID pregunta seguridad
		$SecurityQuestion = 12;

		if ( $userData['who'] == 2 ) {
			$cleanRut = strtoupper( str_replace( array("-", "."), array("", ""), $userData['rutlegal'] ) );
				$dv = substr($cleanRut, -1);
				$rut = substr($cleanRut, 0, -1);
				$rutWefacadeLegal = $rut . "-" . $dv;

			$BusinessTypeId = 'SMALL_BUSINESS';
			$OrganizationTypeId = 'None';
			$CompanyName = '<tem:CompanyName>' . $userData['razonsocial'] . '</tem:CompanyName>';
			$CompanyRegistrationNumber = '<tem:CompanyRegistrationNumber>' . $rutWefacade . '</tem:CompanyRegistrationNumber>';
			$SecondaryNID = '<tem:SecondaryNID>' . $rutWefacadeLegal . '</tem:SecondaryNID>';
			$IndustryCode = '<tem:IndustryCode>' . $userData['giro'] . '</tem:IndustryCode>';
			$NIDAddress = '<tem:NID>' . $rutWefacade . '</tem:NID>';
		}

		$fecha_registro = date("Y-m-d\TH:i:s");
		$phoneCustomer = ($userData['phone']) ? '+56 ' . $userData['cod'] . ' ' . $userData['phone'] : '+56 9 ' . $userData['mobile'];

		$response = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/"> 
		   <soapenv:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
			  <tem:CreateAccount xmlns="http://tempuri.org/">
				 <tem:account>
					<tem:Id>0</tem:Id>
					<tem:CreatedDate>' . $fecha_registro . '</tem:CreatedDate>
					<tem:LastUpdatedDate>' . $fecha_registro . '</tem:LastUpdatedDate>
					<tem:IsDirty>false</tem:IsDirty>
					<tem:AccountStatusDate>' . $fecha_registro . '</tem:AccountStatusDate>
					<tem:AccountStatusId>OPEN</tem:AccountStatusId>
					<tem:AccountTypeId>' . $AccountTypeId . '</tem:AccountTypeId>
					<tem:ActualTagDeposit>0</tem:ActualTagDeposit>
					<tem:AverageToll>0</tem:AverageToll>
					<tem:BalanceDate xsi:nil="true"/>
					<tem:CloseDate xsi:nil="true"/>
					<tem:CloseReason>0</tem:CloseReason>
					<tem:CurrentBalance>0</tem:CurrentBalance>
					<tem:DeletionStateCode>0</tem:DeletionStateCode>
					<tem:DelinquencyCount>0</tem:DelinquencyCount>
					<tem:DelinquencyStatus>0</tem:DelinquencyStatus>
					<tem:ExpectedTagDeposit>0</tem:ExpectedTagDeposit>
					<tem:FinancialStatus>0</tem:FinancialStatus>
					<tem:FinancialStatusDate xsi:nil="true"/>
					<tem:IsDelinquent>false</tem:IsDelinquent>
					<tem:IsFOFF>false</tem:IsFOFF>
					<tem:IsVIP>false</tem:IsVIP>
					<tem:LBTAmount>0</tem:LBTAmount>
					<tem:NBTAmount>0</tem:NBTAmount>
					<tem:OpenDate>' . $fecha_registro . '</tem:OpenDate>
					<tem:OrganizationId>0</tem:OrganizationId>
					<tem:PlanCode>P0200</tem:PlanCode>
					<tem:PrimaryContactId>0</tem:PrimaryContactId>
					<tem:RAStatus>0</tem:RAStatus>
					<tem:RebillAmount>0</tem:RebillAmount>
					<tem:RebillDate xsi:nil="true"/>
					<tem:RebillMethodId>' . $RebillMethodId . '</tem:RebillMethodId>
					<tem:RebillStatusId>NA</tem:RebillStatusId>
					<tem:RegistrationTypeId>TRANSPONDER</tem:RegistrationTypeId>
					<tem:Tier>0</tem:Tier>
					<tem:UTTBalance>0</tem:UTTBalance>
					<tem:UTTBalanceDate xsi:nil="true"/>
					<tem:ViolationBalance>0</tem:ViolationBalance>
					<tem:IsAutoPay>true</tem:IsAutoPay>
					<tem:BusinessTypeId>' . $BusinessTypeId . '</tem:BusinessTypeId>
					<tem:Extensions/>
					<tem:OrganizationTypeId>' . $OrganizationTypeId . '</tem:OrganizationTypeId>
				 </tem:account>
				 <tem:contact>
					<tem:Id>0</tem:Id>
					<tem:CreatedDate>' . $fecha_registro . '</tem:CreatedDate>
					<tem:LastUpdatedDate>' . $fecha_registro . '</tem:LastUpdatedDate>
					<tem:IsDirty>false</tem:IsDirty>
					<tem:AccountId>0</tem:AccountId>
					<tem:BirthDate xsi:nil="true"/>' 
					. $CompanyName 
					. $CompanyRegistrationNumber .
					'<tem:ContactMethod>' . $ContactMethod . '</tem:ContactMethod>
					<tem:CustomerType>' . $CustomerType . '</tem:CustomerType>
					<tem:DayTimePhone>' . $phoneCustomer . '</tem:DayTimePhone>
					<tem:DeletionStateCode>0</tem:DeletionStateCode>
					<tem:Department>?</tem:Department>
					<tem:Email>' . $userData['mail'] . '</tem:Email>
					<tem:FirstName>' . $FirstName . '</tem:FirstName>
					<tem:ICBCStatus>0</tem:ICBCStatus>
					<tem:IsICBCDataValid>false</tem:IsICBCDataValid>
					<tem:IsPrimary>true</tem:IsPrimary>         
					<tem:LastName>' . $LastName . '</tem:LastName>
					<tem:MarketingAnswer>3</tem:MarketingAnswer>
					<tem:MiddleName></tem:MiddleName>
					<tem:MobilePhone>+56 9 ' . $userData['mobile'] . '</tem:MobilePhone>         
					<tem:Password>' . $userData['p4ss'] . '</tem:Password>
					<tem:PrimaryAddressId>0</tem:PrimaryAddressId>          
					<tem:SecurityAnswer>' . $SecurityAnswer . '</tem:SecurityAnswer>
					<tem:SecurityQuestion>' . $SecurityQuestion . '</tem:SecurityQuestion>
					<tem:SignupMethod>3</tem:SignupMethod>
					<tem:SourceId>WEB</tem:SourceId>
					<tem:StatementFrequency>5</tem:StatementFrequency>
					<tem:StatementGroup>0</tem:StatementGroup>
					<tem:StatementMethod>' . $StatementMethod . '</tem:StatementMethod>           
					<tem:NID>' . $rutWefacade . '</tem:NID>' 
					. $SecondaryNID 
					. $IndustryCode . 
					'<tem:PickUpLocId>0</tem:PickUpLocId>
					<tem:ServipagPriority>1</tem:ServipagPriority>
					<tem:LegalRepSequence>0</tem:LegalRepSequence>
					<tem:IsActive>true</tem:IsActive>
				 </tem:contact>
				 <tem:address>
					<tem:Id>0</tem:Id>
					<tem:CreatedDate>' . $fecha_registro . '</tem:CreatedDate>
					<tem:LastUpdatedDate>' . $fecha_registro . '</tem:LastUpdatedDate>
					<tem:IsDirty>false</tem:IsDirty>
					<tem:ContactId>0</tem:ContactId>
					<tem:AddressFirstLine>' . $userData['address'] . '</tem:AddressFirstLine>
					<tem:AddressNumber>0</tem:AddressNumber>
					<tem:AddressSecondLine></tem:AddressSecondLine>
					<tem:AddressThirdLine>' . $City .'</tem:AddressThirdLine>
					<tem:AddressTypeId>PRIMARY</tem:AddressTypeId>
					<tem:City>' . $Province . '</tem:City>
					<tem:CountryCode>' . $CountryCode . '</tem:CountryCode>
					<tem:CountyCode>' . $CountyCode . '</tem:CountyCode>
					<tem:DeletionStateCode>0</tem:DeletionStateCode>
					<tem:IsPrimary>true</tem:IsPrimary>
					<tem:Locale>0</tem:Locale>
					<tem:ShippingMethodId>0</tem:ShippingMethodId>
					<tem:StateProvinceCode>' . $StateProvinceCode . '</tem:StateProvinceCode>' 
					. $NIDAddress 
					. $CompanyName 
					. $IndustryCode . 
				'</tem:address>
				 <tem:rebillMethod>' . $rebillMethod . '</tem:rebillMethod>
				 <tem:expectedPayment>
					<tem:Transponders/>   
					<tem:PaymentType>' . $PaymentType . '</tem:PaymentType>
					<tem:PrepaidToll>0</tem:PrepaidToll>
					<tem:TransponderDeposit>0</tem:TransponderDeposit>
					<tem:RebillAmount>0</tem:RebillAmount>
					<tem:ActualTransponderDeposit>0</tem:ActualTransponderDeposit>
					<tem:LowBalanceAmount>0</tem:LowBalanceAmount>
					<tem:AccountSetupFee>0</tem:AccountSetupFee>
					<tem:UnusedPromotionBalance>0</tem:UnusedPromotionBalance>
					<tem:ExpectedAmount>0</tem:ExpectedAmount>
				 </tem:expectedPayment>' 
				 . $paymentMeans . 
			'<tem:vehicles>';

		if( $vehiclesdata ) foreach ($vehiclesdata as $key => $info_vehicle) {
			$dataVehicle = unserialize( $info_vehicle['car_data'] );

			$IssuerName = '';
			if ( isset( $dataVehicle['tag_consecion'] ) && $dataVehicle['tag_consecion'] !== '' ) {
				$IssuerName = '<tem:IssuerName>' . $dataVehicle['tag_consecion'] .'</tem:IssuerName>';
			}

			switch ($info_vehicle['car_class']) {
				case '1':
					$LicensePlateType = 'MOTORCYCLE';
					$VehicleClassId = 'MOTORCYCLE';
					break;
				case '2':
					$LicensePlateType = 'CAR';
					$VehicleClassId = 'CARS_AND_TRUCKS';
					break;
				case '4':
					$LicensePlateType = 'BUSES_AND_TRUCKS';
					$VehicleClassId = 'BUSES_WITH_2_AXES';
					break;
				case '5':
					$LicensePlateType = 'BUSES_AND_TRUCKS';
					$VehicleClassId = 'TRUCKS_WITH_2_AXES';
					break;
				case '6':
					$LicensePlateType = 'BUSES_AND_TRUCKS';
					$VehicleClassId = 'BUSES_WITH_MORE_THAN_2_AXES';
					break;
				case '7':
					$LicensePlateType = 'BUSES_AND_TRUCKS';
					$VehicleClassId = 'TRUCKS_WITH_MORE_THAN_2_AXES';
					break;
			}

			$VehicleMake = ( $dataVehicle['make_id'] ) ? $dataVehicle['make_id'] : '545';

			$VehicleColor = '';
			if ( $dataVehicle['color'] )
				$VehicleColor = '<tem:VehicleColor>' . $dataVehicle['color'] . '</tem:VehicleColor>';

			$VehicleModel = '';
			if ( $dataVehicle['model'] )
				$VehicleModel = '<tem:VehicleModel>' . $dataVehicle['model'] . '</tem:VehicleModel>';

			$VehicleYear = '';
			if ( $dataVehicle['year'] )
				$VehicleYear = '<tem:VehicleYear>' . $dataVehicle['year'] . '</tem:VehicleYear>';

		   	$response .= '<tem:Vehicle>
				   <tem:Id>0</tem:Id>      
				   <tem:CreatedDate>' . $fecha_registro . '</tem:CreatedDate>
				   <tem:LastUpdatedApp>?</tem:LastUpdatedApp>
				   <tem:LastUpdatedDate>' . $fecha_registro . '</tem:LastUpdatedDate>
				   <tem:IsDirty>false</tem:IsDirty>
				   <tem:AccountId>0</tem:AccountId>
				   <tem:EndDate xsi:nil="true"/>
				   <tem:LicensePlateCountry>' . $LicensePlateCountry . '</tem:LicensePlateCountry>
				   <tem:LicensePlateNumber>' . $info_vehicle['car_value'] . '</tem:LicensePlateNumber>
				   <tem:LicensePlateState>' . $StateProvinceCode . '</tem:LicensePlateState>
				   <tem:LicensePlateType>' . $LicensePlateType . '</tem:LicensePlateType>
				   <tem:PlateStatusDate>' . $fecha_registro . '</tem:PlateStatusDate>
				   <tem:PlateStatusId>ACTIVE</tem:PlateStatusId>
				   <tem:StartDate>' . $fecha_registro . '</tem:StartDate>
				   <tem:VehicleClassId>' . $VehicleClassId . '</tem:VehicleClassId>' 
				   . $VehicleColor . 
				   '<tem:VehicleMake>' . $VehicleMake . '</tem:VehicleMake>' 
				   . $VehicleModel . $VehicleYear . 
          '<tem:AccountTag>
					  <tem:Id>0</tem:Id>
					  <tem:CreatedDate>' . $fecha_registro . '</tem:CreatedDate>
					  <tem:LastUpdatedDate>' . $fecha_registro . '</tem:LastUpdatedDate>    
					  <tem:IsDirty>false</tem:IsDirty>
					  <tem:AccountId>0</tem:AccountId>
					  <tem:TagId>0</tem:TagId>
					  <tem:TagStatusId>NOT_SHIPPED</tem:TagStatusId>
					  <tem:TagStatusDate xsi:nil="true"/>
					  <tem:StartDate xsi:nil="true"/>
					  <tem:EndDate xsi:nil="true"/>
					  <tem:SalesOrderId>0</tem:SalesOrderId>
					  <tem:SalesOrderDetailId>0</tem:SalesOrderDetailId>
					  <tem:SeqNo>0</tem:SeqNo>
					  <tem:IsBackOrder>false</tem:IsBackOrder>
					  <tem:IsCancelOrder>false</tem:IsCancelOrder>
					  <tem:TagPayChoiceId>0</tem:TagPayChoiceId>
					  <tem:DeletionStateCode>0</tem:DeletionStateCode>
					  <tem:ExternalId>' . $dataVehicle['tag_externalid'] .'</tem:ExternalId>' 
					  . $IssuerName . 
					'</tem:AccountTag>
				   <tem:Extensions/>
				   <tem:InteropMonitorStatus>NOT_MONITORING</tem:InteropMonitorStatus>
				   <tem:InteropMonitorStatusDate>' . $fecha_registro . '</tem:InteropMonitorStatusDate>
				</tem:Vehicle>';
		}
		$response .= '</tem:vehicles>
						 <tem:checkDate>' . $fecha_registro . '</tem:checkDate>
						 <tem:ICNId>10781</tem:ICNId>
						 <tem:CSRId>1420</tem:CSRId>
					  </tem:CreateAccount>
				   </soapenv:Body>
				</soapenv:Envelope>';
				
					// header("Content-type: text/xml");
					// echo $response;
					// die();
		return $response;
	}

	function xml_requesting_valida_rut( $rutValidate ) {
		$response = '<?xml version="1.0" encoding="UTF-8"?>
					<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
					   <soapenv:Body>
						  <tem:RutLookUp>
							 <!--Optional:-->
							 <tem:rut>' . $rutValidate . '</tem:rut>
						  </tem:RutLookUp>
					   </soapenv:Body>
					</soapenv:Envelope>';
		return $response;
	}

	function xml_requesting_getaccount_by_rut( $rutValidate ) {
		$cleanRut = strtoupper( str_replace( array("-", "."), array("", ""), $rutValidate ) );
			$dv = substr($cleanRut, -1);
			$rut = substr($cleanRut, 0, -1);
			$rutWefacade = $rut . "-" . $dv;

		$response = '<?xml version="1.0" encoding="UTF-8"?>
					<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
					   <soapenv:Body>
						  <tem:GetAccountByRut>
							 <tem:rut>' . $rutWefacade . '</tem:rut>
						  </tem:GetAccountByRut>
					   </soapenv:Body>
					</soapenv:Envelope>';
		return $response;
	}

	function xml_requesting_valida_patent( $plateValidate ) {
		$response = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
					   <soapenv:Body>
						  <tem:RNUTPlateLookUp>
							 <tem:plate>' . $plateValidate . '</tem:plate>
						  </tem:RNUTPlateLookUp>
					   </soapenv:Body>
					</soapenv:Envelope>';
		return $response;
	}

	function xml_requesting_GetContactByAccountId( $accountID ) {
		$response = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
					   <soapenv:Body>
					      <tem:GetContactByAccountId>
					         <tem:accountId>' . $accountID . '</tem:accountId>
					      </tem:GetContactByAccountId>
					   </soapenv:Body>
					</soapenv:Envelope>';
		return $response;
	}

	function xml_requesting_add_legal_rep( $userData, $PrimaryAddressId ) {
		$fecha_registro = date("Y-m-d\TH:i:s");
		$cleanRut = strtoupper( str_replace( array("-", "."), array("", ""), $userData['rut'] ) );
			$dv = substr($cleanRut, -1);
			$rut = substr($cleanRut, 0, -1);
			$rutWefacade = $rut . "-" . $dv;
		

		$cleanRutLegal = strtoupper( str_replace( array("-", "."), array("", ""), $userData['rutlegal'] ) );
			$dvLegal = substr($cleanRutLegal, -1);
			$rutLegal = substr($cleanRutLegal, 0, -1);
			$rutWefacadeLegal = $rutLegal . "-" . $dvLegal;

		$CustomerType = ( $userData['who'] == 1 ) ? 1 : 2;
		$ContactMethod = 2;
		$BusinessTypeId = 'SMALL_BUSINESS';
		$OrganizationTypeId = 'None';
		$phoneCustomer = ($userData['phone']) ? '+56 9 ' . $userData['cod'] . ' ' . $userData['phone'] : '+56 9 ' . $userData['mobile'];

		$IndustryCode = $userData['giro'];
		$AccountId = $userData['id_user_webfacade'];
		$Email = $userData['mail'];

		//Ultimos 4 digitos RUT para respuesta pregunta secreta
		$tmpRut = substr($cleanRut, -5);
		$SecurityAnswer = substr($tmpRut, 0, 4);
		//ID pregunta seguridad
		$SecurityQuestion = 12;

		$fecha_registro = date("Y-m-d\TH:i:s");

		$response = '<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
					  <s:Header>
					    <Action s:mustUnderstand="0" xmlns="http://schemas.microsoft.com/ws/2005/05/addressing/none">http://tempuri.org/AddLegalRep</Action>
					  </s:Header>
					  <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
					    <AddLegalRep xmlns="http://tempuri.org/">
					      <legalRep>
					        <Id>0</Id>
					        <CreatedDate xsi:nil="true" />
					        <LastUpdatedDate xsi:nil="true" />
					        <IsDirty>false</IsDirty>
					        <AccountId>' . $AccountId . '</AccountId>
					        <BirthDate xsi:nil="true" />
					        <CompanyName>' . utf8_decode($userData['razonsocial']) . '</CompanyName>
					        <CompanyRegistrationNumber>' . $rutWefacade . '</CompanyRegistrationNumber>
					        <ContactMethod>' . $ContactMethod . '</ContactMethod>
					        <CustomerType>2</CustomerType>
					        <DeletionStateCode>0</DeletionStateCode>
					        <Email>' . $Email . '</Email>
					        <FirstName>' . $userData['rep_name'] . '</FirstName>
					        <ICBCStatus>0</ICBCStatus>
					        <IsICBCDataValid>false</IsICBCDataValid>
					        <IsPrimary>false</IsPrimary>
					        <LastName>' . utf8_decode($userData['rep_lastname']) . '</LastName>
					        <MarketingAnswer>-1</MarketingAnswer>
					        <PrimaryAddressId>534</PrimaryAddressId>
					        <SecurityQuestion xsi:nil="true" />
					        <SignupMethod>3</SignupMethod>
					        <SourceId>WEB</SourceId>
					        <StatementFrequency>1</StatementFrequency>
					        <StatementGroup>0</StatementGroup>
					        <StatementMethod>2</StatementMethod>
					        <NID>' . $rutWefacade . '</NID>
					        <SecondaryNID>' . $rutWefacadeLegal . '</SecondaryNID>
					        <IndustryCode>' . $IndustryCode . '</IndustryCode>
					        <PickUpLocId>0</PickUpLocId>
					        <ServipagPriority>0</ServipagPriority>
					        <LegalRepSequence>1</LegalRepSequence>
					        <IsActive>true</IsActive>
					        <MobilePhone>' . $phoneCustomer . '</MobilePhone>
					        <DayTimePhone>' . $phoneCustomer . '</DayTimePhone>
					        <MiddleName>' . utf8_decode($userData['rep_matlastname']) . '</MiddleName>
					      </legalRep>
					    </AddLegalRep>
					  </s:Body>
					</s:Envelope>';

		return $response;
	}

	function xml_requesting_create_webaccess( $userData ) {
		$cleanRut = strtoupper( str_replace( array("-", "."), array("", ""), $userData['rut'] ) );
			$dv = substr($cleanRut, -1);
			$rut = substr($cleanRut, 0, -1);
			$rutWefacade = $rut . "-" . $dv;
		

		//Ultimos 4 digitos RUT para respuesta pregunta secreta
		$tmpRut = substr($cleanRut, -5);
		$SecurityAnswer = substr($tmpRut, 0, 4);
		//ID pregunta seguridad
		$SecurityQuestion = 12;

		$AccountId = $userData['id_user_webfacade'];

		$response = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
					   <soapenv:Body>
					      <tem:CreateWebAccess>
					         <tem:rut>' . $rutWefacade . '</tem:rut>
					         <tem:password>' . $userData['p4ss'] . '</tem:password>
					         <tem:securityQuestionId>' . $SecurityQuestion . '</tem:securityQuestionId>
					         <tem:securityAnswer>' . $SecurityAnswer . '</tem:securityAnswer>
					         <tem:accountId>' . $AccountId . '</tem:accountId>
					      </tem:CreateWebAccess>
					   </soapenv:Body>
					</soapenv:Envelope>';
		return $response;
	}

	function _sendMailBienvenida( $datUser ) {
		require WWW_ROOT . 'mailer' . DS . 'PHPMailerAutoload.php';

		$comuna = $this->Comuna->find( $datUser['comuna_id'] );
		$datUser['comuna'] = $comuna['Comuna']['name'];
		$datUser['region'] = $comuna['Regione']['name'];

		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = "mail.rutamaipo.cl";
		//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port = 25;
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication
		$mail->Username = "servicioalcliente@rutamaipo.cl";
		//Password to use for SMTP authentication
		$mail->Password = "Rdm.2014";
		//Set who the message is to be sent from
		$mail->setFrom('servicioalcliente@rutamaipo.cl', 'Ruta Maipo');
		//Set an alternative reply-to address
		// $mail->addReplyTo('replyto@example.com', 'First Last');
		//Set who the message is to be sent to
		$mail->addAddress($datUser['mail']);
		//Set the subject line
		$mail->Subject = utf8_decode('Bienvenido al Sistema de TAG Interurbano de Ruta del Maipo');
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$templateInvita = file_get_contents(WWW_ROOT . 'suscripcion-' . strtolower( $datUser['paytype'] ) . '.html' );

		if( $datUser['who'] == 2 ) {
        	$first_name = $datUser['razonsocial'];
        } else {
        	$first_name = $datUser['first_name'] . ' ' . $datUser['last_name'];
        }

        $templateInvita = str_replace('__FIRST_NAME__', $first_name, $templateInvita);
        $templateInvita = str_replace('__ACCOUNTNUMBER__', $datUser['accountNumber'], $templateInvita);
        $templateInvita = str_replace('__ACCOUNTNUMBER__', $datUser['accountNumber'], $templateInvita);

		$mail->msgHTML(utf8_decode($templateInvita));

		$mail->addAttachment(WWW_ROOT . 'Condiciones_Generales_y_Operativas.pdf');
		if ( strtolower( $datUser['paytype'] ) == 'pac' ) {
			$mail->addAttachment(WWW_ROOT . 'Formulario_Suscripcion_Pago_Automatico.pdf');
		}

		//Replace the plain text body with one created manually
		$mail->AltBody = '';
		//Attach an image file
		// $mail->addAttachment('images/phpmailer_mini.png');

		//send the message, check for errors
		if (!$mail->send()) {
		    $erroSmtp = "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    $erroSmtp = "Message sent!";
		}
	}

	function _sendMailInvitar( $dataFriends ) {
		require WWW_ROOT . 'mailer' . DS . 'PHPMailerAutoload.php';

		$erroSmtp = '';
		foreach ( $dataFriends as $key => $emailStr ) {
			//Create a new PHPMailer instance
			$mail = new PHPMailer;
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 0;
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';
			//Set the hostname of the mail server
			$mail->Host = "mail.rutamaipo.cl";
			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 25;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			//Username to use for SMTP authentication
			$mail->Username = "servicioalcliente@rutamaipo.cl";
			//Password to use for SMTP authentication
			$mail->Password = "Rdm.2014";
			//Set who the message is to be sent from
			$mail->setFrom('servicioalcliente@rutamaipo.cl', 'Ruta Maipo');
			//Set an alternative reply-to address
			// $mail->addReplyTo('replyto@example.com', 'First Last');
			//Set who the message is to be sent to
			$mail->addAddress($emailStr);
			//Set the subject line
			$mail->Subject = utf8_decode('Invitación suscripción Sistema de TAG Interurbano de Ruta del Maipo');
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$templateInvita = file_get_contents(WWW_ROOT . 'invitar.html');

			$mail->msgHTML($templateInvita);
			//Replace the plain text body with one created manually
			$mail->AltBody = '';
			//Attach an image file
			// $mail->addAttachment('images/phpmailer_mini.png');

			//send the message, check for errors
			if (!$mail->send()) {
			    $erroSmtp = "Mailer Error: " . $mail->ErrorInfo;
			} else {
			    $erroSmtp = "Message sent!";
			}
		}

		return $erroSmtp;
	}
	
/**
 * Atributo con marcas de  vehiculos
 *
 * @var array
 * @access public
 */
	var $vehicles_makes_all = array(
				   array(
					  'id' => 1,
					  'name' => 'Abat'
				   ),
				   array(
					  'id' => 2,
					  'name' => 'Acadian'
				   ),
				   array(
					  'id' => 3,
					  'name' => 'Acura'
				   ),
				   array(
					  'id' => 4,
					  'name' => 'Adventure'
				   ),
				   array(
					  'id' => 5,
					  'name' => 'Africa'
				   ),
				   array(
					  'id' => 6,
					  'name' => 'Agrale'
				   ),
				   array(
					  'id' => 7,
					  'name' => 'Agromaq'
				   ),
				   array(
					  'id' => 8,
					  'name' => 'Agusta'
				   ),
				   array(
					  'id' => 9,
					  'name' => 'AJS'
				   ),
				   array(
					  'id' => 10,
					  'name' => 'Alba Motors'
				   ),
				   array(
					  'id' => 11,
					  'name' => 'Alfa Romeo'
				   ),
				   array(
					  'id' => 12,
					  'name' => 'Altec'
				   ),
				   array(
					  'id' => 13,
					  'name' => 'AMC'
				   ),
				   array(
					  'id' => 14,
					  'name' => 'American Motors'
				   ),
				   array(
					  'id' => 15,
					  'name' => 'Aprilia'
				   ),
				   array(
					  'id' => 16,
					  'name' => 'Aqualine'
				   ),
				   array(
					  'id' => 17,
					  'name' => 'Aro'
				   ),
				   array(
					  'id' => 18,
					  'name' => 'Articat'
				   ),
				   array(
					  'id' => 19,
					  'name' => 'Artigiana'
				   ),
				   array(
					  'id' => 20,
					  'name' => 'Asia'
				   ),
				   array(
					  'id' => 21,
					  'name' => 'Aston Martin'
				   ),
				   array(
					  'id' => 22,
					  'name' => 'Atlas'
				   ),
				   array(
					  'id' => 23,
					  'name' => 'ATV'
				   ),
				   array(
					  'id' => 24,
					  'name' => 'Audi'
				   ),
				   array(
					  'id' => 25,
					  'name' => 'Aupa'
				   ),
				   array(
					  'id' => 26,
					  'name' => 'Ausa'
				   ),
				   array(
					  'id' => 27,
					  'name' => 'Austin'
				   ),
				   array(
					  'id' => 28,
					  'name' => 'Automoto'
				   ),
				   array(
					  'id' => 29,
					  'name' => 'Autorrad'
				   ),
				   array(
					  'id' => 30,
					  'name' => 'Aveling-barford'
				   ),
				   array(
					  'id' => 31,
					  'name' => 'Axion'
				   ),
				   array(
					  'id' => 32,
					  'name' => 'Baja'
				   ),
				   array(
					  'id' => 33,
					  'name' => 'Bajaj'
				   ),
				   array(
					  'id' => 34,
					  'name' => 'Baldan'
				   ),
				   array(
					  'id' => 35,
					  'name' => 'Baolat'
				   ),
				   array(
					  'id' => 36,
					  'name' => 'Baotion'
				   ),
				   array(
					  'id' => 37,
					  'name' => 'Bashan'
				   ),
				   array(
					  'id' => 38,
					  'name' => 'Bayliner'
				   ),
				   array(
					  'id' => 39,
					  'name' => 'Belarus'
				   ),
				   array(
					  'id' => 40,
					  'name' => 'Belav - Tomav'
				   ),
				   array(
					  'id' => 41,
					  'name' => 'Benelli'
				   ),
				   array(
					  'id' => 42,
					  'name' => 'Benyi'
				   ),
				   array(
					  'id' => 43,
					  'name' => 'Benzhou'
				   ),
				   array(
					  'id' => 44,
					  'name' => 'Bertone'
				   ),
				   array(
					  'id' => 45,
					  'name' => 'Bigfoot'
				   ),
				   array(
					  'id' => 46,
					  'name' => 'Bimota'
				   ),
				   array(
					  'id' => 47,
					  'name' => 'Black Diamond'
				   ),
				   array(
					  'id' => 48,
					  'name' => 'BMW'
				   ),
				   array(
					  'id' => 49,
					  'name' => 'Bobcat'
				   ),
				   array(
					  'id' => 50,
					  'name' => 'Bohemia'
				   ),
				   array(
					  'id' => 51,
					  'name' => 'Bomag'
				   ),
				   array(
					  'id' => 52,
					  'name' => 'Bombard'
				   ),
				   array(
					  'id' => 53,
					  'name' => 'Bombardier'
				   ),
				   array(
					  'id' => 54,
					  'name' => 'Bonluck'
				   ),
				   array(
					  'id' => 55,
					  'name' => 'Borgward'
				   ),
				   array(
					  'id' => 56,
					  'name' => 'Bortex'
				   ),
				   array(
					  'id' => 57,
					  'name' => 'Breuer'
				   ),
				   array(
					  'id' => 58,
					  'name' => 'Breviglieri'
				   ),
				   array(
					  'id' => 59,
					  'name' => 'Brias'
				   ),
				   array(
					  'id' => 60,
					  'name' => 'Brillance'
				   ),
				   array(
					  'id' => 61,
					  'name' => 'Brilliant'
				   ),
				   array(
					  'id' => 62,
					  'name' => 'Brillon'
				   ),
				   array(
					  'id' => 63,
					  'name' => 'Bros'
				   ),
				   array(
					  'id' => 64,
					  'name' => 'BRP CAN-AM'
				   ),
				   array(
					  'id' => 65,
					  'name' => 'BSA'
				   ),
				   array(
					  'id' => 66,
					  'name' => 'Buell'
				   ),
				   array(
					  'id' => 67,
					  'name' => 'Bugatti'
				   ),
				   array(
					  'id' => 68,
					  'name' => 'Buggy'
				   ),
				   array(
					  'id' => 69,
					  'name' => 'Busscar'
				   ),
				   array(
					  'id' => 70,
					  'name' => 'BYD'
				   ),
				   array(
					  'id' => 71,
					  'name' => 'Caburga'
				   ),
				   array(
					  'id' => 72,
					  'name' => 'Cadillac'
				   ),
				   array(
					  'id' => 73,
					  'name' => 'Cagina'
				   ),
				   array(
					  'id' => 74,
					  'name' => 'Cagiva'
				   ),
				   array(
					  'id' => 75,
					  'name' => 'Caky'
				   ),
				   array(
					  'id' => 76,
					  'name' => 'Can-Am'
				   ),
				   array(
					  'id' => 77,
					  'name' => 'Canoa'
				   ),
				   array(
					  'id' => 78,
					  'name' => 'Carraro'
				   ),
				   array(
					  'id' => 79,
					  'name' => 'Case'
				   ),
				   array(
					  'id' => 80,
					  'name' => 'Catalina'
				   ),
				   array(
					  'id' => 81,
					  'name' => 'Caterpillar'
				   ),
				   array(
					  'id' => 82,
					  'name' => 'CF Moto'
				   ),
				   array(
					  'id' => 83,
					  'name' => 'CGB Trailer'
				   ),
				   array(
					  'id' => 84,
					  'name' => 'Champion'
				   ),
				   array(
					  'id' => 85,
					  'name' => 'Chandler'
				   ),
				   array(
					  'id' => 86,
					  'name' => 'Changan'
				   ),
				   array(
					  'id' => 87,
					  'name' => 'Changjeng'
				   ),
				   array(
					  'id' => 88,
					  'name' => 'Cherokee'
				   ),
				   array(
					  'id' => 89,
					  'name' => 'Chery'
				   ),
				   array(
					  'id' => 90,
					  'name' => 'Chevrolet'
				   ),
				   array(
					  'id' => 91,
					  'name' => 'Chituma'
				   ),
				   array(
					  'id' => 92,
					  'name' => 'Choice'
				   ),
				   array(
					  'id' => 93,
					  'name' => 'Chrysler'
				   ),
				   array(
					  'id' => 94,
					  'name' => 'Cima'
				   ),
				   array(
					  'id' => 95,
					  'name' => 'Citroën'
				   ),
				   array(
					  'id' => 96,
					  'name' => 'Coachmen'
				   ),
				   array(
					  'id' => 97,
					  'name' => 'Cobalt'
				   ),
				   array(
					  'id' => 98,
					  'name' => 'Coleman'
				   ),
				   array(
					  'id' => 99,
					  'name' => 'Coloso'
				   ),
				   array(
					  'id' => 100,
					  'name' => 'Comil'
				   ),
				   array(
					  'id' => 101,
					  'name' => 'Compair'
				   ),
				   array(
					  'id' => 102,
					  'name' => 'Comuta-Car'
				   ),
				   array(
					  'id' => 103,
					  'name' => 'Cross'
				   ),
				   array(
					  'id' => 104,
					  'name' => 'Curiram'
				   ),
				   array(
					  'id' => 105,
					  'name' => 'Custom'
				   ),
				   array(
					  'id' => 106,
					  'name' => 'Dadyw'
				   ),
				   array(
					  'id' => 107,
					  'name' => 'Daelim'
				   ),
				   array(
					  'id' => 108,
					  'name' => 'Daewoo'
				   ),
				   array(
					  'id' => 109,
					  'name' => 'Daf'
				   ),
				   array(
					  'id' => 110,
					  'name' => 'Daihatsu'
				   ),
				   array(
					  'id' => 111,
					  'name' => 'Datsun'
				   ),
				   array(
					  'id' => 112,
					  'name' => 'Dax'
				   ),
				   array(
					  'id' => 113,
					  'name' => 'Dayun'
				   ),
				   array(
					  'id' => 114,
					  'name' => 'Demag'
				   ),
				   array(
					  'id' => 115,
					  'name' => 'Deutz-Fahr'
				   ),
				   array(
					  'id' => 116,
					  'name' => 'DFM'
				   ),
				   array(
					  'id' => 117,
					  'name' => 'Dimex'
				   ),
				   array(
					  'id' => 118,
					  'name' => 'Dingo'
				   ),
				   array(
					  'id' => 119,
					  'name' => 'Divermaq'
				   ),
				   array(
					  'id' => 120,
					  'name' => 'DKW'
				   ),
				   array(
					  'id' => 121,
					  'name' => 'Dodge'
				   ),
				   array(
					  'id' => 122,
					  'name' => 'Dongfeng'
				   ),
				   array(
					  'id' => 123,
					  'name' => 'Doosan'
				   ),
				   array(
					  'id' => 124,
					  'name' => 'Ducar'
				   ),
				   array(
					  'id' => 125,
					  'name' => 'Ducati'
				   ),
				   array(
					  'id' => 126,
					  'name' => 'Duroboat'
				   ),
				   array(
					  'id' => 127,
					  'name' => 'E-One'
				   ),
				   array(
					  'id' => 128,
					  'name' => 'Eager Beaver'
				   ),
				   array(
					  'id' => 129,
					  'name' => 'Eagle'
				   ),
				   array(
					  'id' => 130,
					  'name' => 'Ecoline'
				   ),
				   array(
					  'id' => 131,
					  'name' => 'Elho'
				   ),
				   array(
					  'id' => 132,
					  'name' => 'Escape'
				   ),
				   array(
					  'id' => 133,
					  'name' => 'Estuder'
				   ),
				   array(
					  'id' => 134,
					  'name' => 'Euromot'
				   ),
				   array(
					  'id' => 135,
					  'name' => 'Europard'
				   ),
				   array(
					  'id' => 136,
					  'name' => 'Exel'
				   ),
				   array(
					  'id' => 137,
					  'name' => 'Fada'
				   ),
				   array(
					  'id' => 138,
					  'name' => 'Falc'
				   ),
				   array(
					  'id' => 139,
					  'name' => 'Farmtrac'
				   ),
				   array(
					  'id' => 140,
					  'name' => 'Fayser'
				   ),
				   array(
					  'id' => 141,
					  'name' => 'Ferrari'
				   ),
				   array(
					  'id' => 142,
					  'name' => 'Fiat'
				   ),
				   array(
					  'id' => 143,
					  'name' => 'Fiatallis'
				   ),
				   array(
					  'id' => 144,
					  'name' => 'Fibermold'
				   ),
				   array(
					  'id' => 145,
					  'name' => 'Fibertex'
				   ),
				   array(
					  'id' => 146,
					  'name' => 'Fina'
				   ),
				   array(
					  'id' => 147,
					  'name' => 'Firemax'
				   ),
				   array(
					  'id' => 148,
					  'name' => 'Fisher Sportscars'
				   ),
				   array(
					  'id' => 149,
					  'name' => 'Fleewood'
				   ),
				   array(
					  'id' => 150,
					  'name' => 'FMA'
				   ),
				   array(
					  'id' => 151,
					  'name' => 'Ford'
				   ),
				   array(
					  'id' => 152,
					  'name' => 'Forest River'
				   ),
				   array(
					  'id' => 153,
					  'name' => 'Forson'
				   ),
				   array(
					  'id' => 154,
					  'name' => 'Foton'
				   ),
				   array(
					  'id' => 155,
					  'name' => 'Four'
				   ),
				   array(
					  'id' => 156,
					  'name' => 'Free Way'
				   ),
				   array(
					  'id' => 157,
					  'name' => 'Freightliner'
				   ),
				   array(
					  'id' => 158,
					  'name' => 'Fruehauf'
				   ),
				   array(
					  'id' => 159,
					  'name' => 'Fullcar'
				   ),
				   array(
					  'id' => 160,
					  'name' => 'Fuso'
				   ),
				   array(
					  'id' => 161,
					  'name' => 'Futong'
				   ),
				   array(
					  'id' => 162,
					  'name' => 'Galion'
				   ),
				   array(
					  'id' => 163,
					  'name' => 'Gama'
				   ),
				   array(
					  'id' => 164,
					  'name' => 'Garant Kotte'
				   ),
				   array(
					  'id' => 165,
					  'name' => 'Gardella'
				   ),
				   array(
					  'id' => 166,
					  'name' => 'Garelli'
				   ),
				   array(
					  'id' => 167,
					  'name' => 'Gas Gas'
				   ),
				   array(
					  'id' => 168,
					  'name' => 'Geely'
				   ),
				   array(
					  'id' => 169,
					  'name' => 'Geo'
				   ),
				   array(
					  'id' => 170,
					  'name' => 'Gilera'
				   ),
				   array(
					  'id' => 171,
					  'name' => 'Glastrom'
				   ),
				   array(
					  'id' => 172,
					  'name' => 'GMC'
				   ),
				   array(
					  'id' => 173,
					  'name' => 'Goldini'
				   ),
				   array(
					  'id' => 174,
					  'name' => 'Goren'
				   ),
				   array(
					  'id' => 175,
					  'name' => 'Great Dane'
				   ),
				   array(
					  'id' => 176,
					  'name' => 'Great Wall'
				   ),
				   array(
					  'id' => 177,
					  'name' => 'Greenmaster'
				   ),
				   array(
					  'id' => 178,
					  'name' => 'Gribaldi &amp; Salvia'
				   ),
				   array(
					  'id' => 179,
					  'name' => 'Grimme'
				   ),
				   array(
					  'id' => 180,
					  'name' => 'Grove'
				   ),
				   array(
					  'id' => 181,
					  'name' => 'Grua'
				   ),
				   array(
					  'id' => 182,
					  'name' => 'Guzzi'
				   ),
				   array(
					  'id' => 183,
					  'name' => 'Hafei'
				   ),
				   array(
					  'id' => 184,
					  'name' => 'Haima'
				   ),
				   array(
					  'id' => 185,
					  'name' => 'Hammel'
				   ),
				   array(
					  'id' => 186,
					  'name' => 'Hardi'
				   ),
				   array(
					  'id' => 187,
					  'name' => 'Harford'
				   ),
				   array(
					  'id' => 188,
					  'name' => 'Harley Davidson'
				   ),
				   array(
					  'id' => 189,
					  'name' => 'Hechizo'
				   ),
				   array(
					  'id' => 190,
					  'name' => 'Heli'
				   ),
				   array(
					  'id' => 191,
					  'name' => 'Hensim'
				   ),
				   array(
					  'id' => 192,
					  'name' => 'Hero Puch'
				   ),
				   array(
					  'id' => 193,
					  'name' => 'Higer'
				   ),
				   array(
					  'id' => 194,
					  'name' => 'Hino'
				   ),
				   array(
					  'id' => 195,
					  'name' => 'Hitachi'
				   ),
				   array(
					  'id' => 196,
					  'name' => 'Honda'
				   ),
				   array(
					  'id' => 197,
					  'name' => 'Honex'
				   ),
				   array(
					  'id' => 198,
					  'name' => 'Howard'
				   ),
				   array(
					  'id' => 199,
					  'name' => 'Huatai'
				   ),
				   array(
					  'id' => 200,
					  'name' => 'Hudson'
				   ),
				   array(
					  'id' => 201,
					  'name' => 'Hummer'
				   ),
				   array(
					  'id' => 202,
					  'name' => 'Hunter'
				   ),
				   array(
					  'id' => 203,
					  'name' => 'Husaberg'
				   ),
				   array(
					  'id' => 204,
					  'name' => 'Husqvarna'
				   ),
				   array(
					  'id' => 205,
					  'name' => 'Hyosung'
				   ),
				   array(
					  'id' => 206,
					  'name' => 'Hyster'
				   ),
				   array(
					  'id' => 207,
					  'name' => 'Hyundai'
				   ),
				   array(
					  'id' => 208,
					  'name' => 'Ibiza'
				   ),
				   array(
					  'id' => 209,
					  'name' => 'Ika'
				   ),
				   array(
					  'id' => 210,
					  'name' => 'Indusa'
				   ),
				   array(
					  'id' => 211,
					  'name' => 'Infiniti'
				   ),
				   array(
					  'id' => 212,
					  'name' => 'Ingersoll Rand'
				   ),
				   array(
					  'id' => 213,
					  'name' => 'Inrecar'
				   ),
				   array(
					  'id' => 214,
					  'name' => 'International'
				   ),
				   array(
					  'id' => 215,
					  'name' => 'Invermoto'
				   ),
				   array(
					  'id' => 216,
					  'name' => 'Isuzu'
				   ),
				   array(
					  'id' => 217,
					  'name' => 'Iveco'
				   ),
				   array(
					  'id' => 218,
					  'name' => 'Ivesa'
				   ),
				   array(
					  'id' => 219,
					  'name' => 'Jaar'
				   ),
				   array(
					  'id' => 220,
					  'name' => 'JAC Motors'
				   ),
				   array(
					  'id' => 221,
					  'name' => 'Jacto'
				   ),
				   array(
					  'id' => 222,
					  'name' => 'Jaguar'
				   ),
				   array(
					  'id' => 223,
					  'name' => 'Jan'
				   ),
				   array(
					  'id' => 224,
					  'name' => 'Jawa'
				   ),
				   array(
					  'id' => 225,
					  'name' => 'Jayco'
				   ),
				   array(
					  'id' => 226,
					  'name' => 'JCB'
				   ),
				   array(
					  'id' => 227,
					  'name' => 'Jeep'
				   ),
				   array(
					  'id' => 228,
					  'name' => 'JF'
				   ),
				   array(
					  'id' => 229,
					  'name' => 'ialing'
				   ),
				   array(
					  'id' => 230,
					  'name' => 'Jianshe'
				   ),
				   array(
					  'id' => 231,
					  'name' => 'Jiapeng'
				   ),
				   array(
					  'id' => 232,
					  'name' => 'Jin Lun'
				   ),
				   array(
					  'id' => 233,
					  'name' => 'Jinbei'
				   ),
				   array(
					  'id' => 234,
					  'name' => 'Jincheng'
				   ),
				   array(
					  'id' => 235,
					  'name' => 'Jinma'
				   ),
				   array(
					  'id' => 236,
					  'name' => 'JMC'
				   ),
				   array(
					  'id' => 237,
					  'name' => 'John Deere'
				   ),
				   array(
					  'id' => 238,
					  'name' => 'John Henry'
				   ),
				   array(
					  'id' => 239,
					  'name' => 'Jonway'
				   ),
				   array(
					  'id' => 240,
					  'name' => 'Joyride'
				   ),
				   array(
					  'id' => 241,
					  'name' => 'Jumil'
				   ),
				   array(
					  'id' => 242,
					  'name' => 'Jurmar'
				   ),
				   array(
					  'id' => 243,
					  'name' => 'Kamaz'
				   ),
				   array(
					  'id' => 244,
					  'name' => 'Kawasaki'
				   ),
				   array(
					  'id' => 245,
					  'name' => 'Kayak'
				   ),
				   array(
					  'id' => 246,
					  'name' => 'Keeway'
				   ),
				   array(
					  'id' => 247,
					  'name' => 'Kenworth'
				   ),
				   array(
					  'id' => 248,
					  'name' => 'Keystone'
				   ),
				   array(
					  'id' => 249,
					  'name' => 'Kia'
				   ),
				   array(
					  'id' => 250,
					  'name' => 'Kia Motors'
				   ),
				   array(
					  'id' => 251,
					  'name' => 'Kingyard'
				   ),
				   array(
					  'id' => 252,
					  'name' => 'Kinlon'
				   ),
				   array(
					  'id' => 253,
					  'name' => 'Kinroad'
				   ),
				   array(
					  'id' => 254,
					  'name' => 'Knigth'
				   ),
				   array(
					  'id' => 255,
					  'name' => 'Kobelco'
				   ),
				   array(
					  'id' => 256,
					  'name' => 'Komatsu'
				   ),
				   array(
					  'id' => 257,
					  'name' => 'KTM'
				   ),
				   array(
					  'id' => 258,
					  'name' => 'Kuhn'
				   ),
				   array(
					  'id' => 259,
					  'name' => 'Kvernerland'
				   ),
				   array(
					  'id' => 260,
					  'name' => 'Kymco'
				   ),
				   array(
					  'id' => 261,
					  'name' => 'KZ'
				   ),
				   array(
					  'id' => 262,
					  'name' => 'Labounty'
				   ),
				   array(
					  'id' => 263,
					  'name' => 'Lada'
				   ),
				   array(
					  'id' => 264,
					  'name' => 'Lamborghini'
				   ),
				   array(
					  'id' => 265,
					  'name' => 'Lambretta'
				   ),
				   array(
					  'id' => 266,
					  'name' => 'Lancia'
				   ),
				   array(
					  'id' => 267,
					  'name' => 'Land Mark'
				   ),
				   array(
					  'id' => 268,
					  'name' => 'Land Rover'
				   ),
				   array(
					  'id' => 269,
					  'name' => 'Landini'
				   ),
				   array(
					  'id' => 270,
					  'name' => 'Larson'
				   ),
				   array(
					  'id' => 271,
					  'name' => 'Laverda'
				   ),
				   array(
					  'id' => 272,
					  'name' => 'Leike'
				   ),
				   array(
					  'id' => 273,
					  'name' => 'Lely'
				   ),
				   array(
					  'id' => 274,
					  'name' => 'Lemken'
				   ),
				   array(
					  'id' => 275,
					  'name' => 'Lexus'
				   ),
				   array(
					  'id' => 276,
					  'name' => 'Leyland'
				   ),
				   array(
					  'id' => 277,
					  'name' => 'Lian Mei'
				   ),
				   array(
					  'id' => 278,
					  'name' => 'Liebherr'
				   ),
				   array(
					  'id' => 279,
					  'name' => 'Lifan'
				   ),
				   array(
					  'id' => 280,
					  'name' => 'Lihhai'
				   ),
				   array(
					  'id' => 281,
					  'name' => 'Lincoln'
				   ),
				   array(
					  'id' => 282,
					  'name' => 'Link-Belt'
				   ),
				   array(
					  'id' => 283,
					  'name' => 'Lishan Bus'
				   ),
				   array(
					  'id' => 284,
					  'name' => 'Litostrog'
				   ),
				   array(
					  'id' => 285,
					  'name' => 'LML'
				   ),
				   array(
					  'id' => 286,
					  'name' => 'Loncin'
				   ),
				   array(
					  'id' => 287,
					  'name' => 'Longstar'
				   ),
				   array(
					  'id' => 288,
					  'name' => 'Lotus'
				   ),
				   array(
					  'id' => 289,
					  'name' => 'Luojia'
				   ),
				   array(
					  'id' => 290,
					  'name' => 'Machile'
				   ),
				   array(
					  'id' => 291,
					  'name' => 'Mack'
				   ),
				   array(
					  'id' => 292,
					  'name' => 'Madal'
				   ),
				   array(
					  'id' => 293,
					  'name' => 'Magirus Deutz'
				   ),
				   array(
					  'id' => 294,
					  'name' => 'Magrinsa'
				   ),
				   array(
					  'id' => 295,
					  'name' => 'Mahindra'
				   ),
				   array(
					  'id' => 296,
					  'name' => 'Maico'
				   ),
				   array(
					  'id' => 297,
					  'name' => 'MainMotor'
				   ),
				   array(
					  'id' => 298,
					  'name' => 'Majesa'
				   ),
				   array(
					  'id' => 299,
					  'name' => 'Malbec'
				   ),
				   array(
					  'id' => 300,
					  'name' => 'Man'
				   ),
				   array(
					  'id' => 301,
					  'name' => 'Manac'
				   ),
				   array(
					  'id' => 302,
					  'name' => 'Marchesan'
				   ),
				   array(
					  'id' => 303,
					  'name' => 'Marcopolo'
				   ),
				   array(
					  'id' => 304,
					  'name' => 'Mariner'
				   ),
				   array(
					  'id' => 305,
					  'name' => 'Maserati'
				   ),
				   array(
					  'id' => 306,
					  'name' => 'Massey ferguson'
				   ),
				   array(
					  'id' => 307,
					  'name' => 'Mathews Company'
				   ),
				   array(
					  'id' => 308,
					  'name' => 'Maxum'
				   ),
				   array(
					  'id' => 309,
					  'name' => 'Mayov'
				   ),
				   array(
					  'id' => 310,
					  'name' => 'Mazda'
				   ),
				   array(
					  'id' => 311,
					  'name' => 'Megelli'
				   ),
				   array(
					  'id' => 312,
					  'name' => 'Mercedes Benz'
				   ),
				   array(
					  'id' => 313,
					  'name' => 'Mercruiser'
				   ),
				   array(
					  'id' => 314,
					  'name' => 'Mercury'
				   ),
				   array(
					  'id' => 315,
					  'name' => 'MG'
				   ),
				   array(
					  'id' => 316,
					  'name' => 'Michigan'
				   ),
				   array(
					  'id' => 317,
					  'name' => 'Mikilon'
				   ),
				   array(
					  'id' => 318,
					  'name' => 'Mini Cooper'
				   ),
				   array(
					  'id' => 319,
					  'name' => 'Mits'
				   ),
				   array(
					  'id' => 320,
					  'name' => 'Mitsubishi'
				   ),
				   array(
					  'id' => 321,
					  'name' => 'Monosem'
				   ),
				   array(
					  'id' => 322,
					  'name' => 'Monster'
				   ),
				   array(
					  'id' => 323,
					  'name' => 'Montelli'
				   ),
				   array(
					  'id' => 324,
					  'name' => 'ontenegro'
				   ),
				   array(
					  'id' => 325,
					  'name' => 'Monterrey'
				   ),
				   array(
					  'id' => 326,
					  'name' => 'Montesa'
				   ),
				   array(
					  'id' => 327,
					  'name' => 'Morbidelli'
				   ),
				   array(
					  'id' => 328,
					  'name' => 'Morris'
				   ),
				   array(
					  'id' => 329,
					  'name' => 'Moskito'
				   ),
				   array(
					  'id' => 330,
					  'name' => 'Moto ABC'
				   ),
				   array(
					  'id' => 331,
					  'name' => 'Moto-Vitale'
				   ),
				   array(
					  'id' => 332,
					  'name' => 'Motobi'
				   ),
				   array(
					  'id' => 333,
					  'name' => 'Motoguzzi'
				   ),
				   array(
					  'id' => 334,
					  'name' => 'Motomel'
				   ),
				   array(
					  'id' => 335,
					  'name' => 'Motorhome'
				   ),
				   array(
					  'id' => 336,
					  'name' => 'Motorrad'
				   ),
				   array(
					  'id' => 337,
					  'name' => 'Motosport'
				   ),
				   array(
					  'id' => 338,
					  'name' => 'Movil'
				   ),
				   array(
					  'id' => 339,
					  'name' => 'MPT'
				   ),
				   array(
					  'id' => 340,
					  'name' => 'MSK'
				   ),
				   array(
					  'id' => 341,
					  'name' => 'MTD'
				   ),
				   array(
					  'id' => 342,
					  'name' => 'Mussre'
				   ),
				   array(
					  'id' => 343,
					  'name' => 'Mustang'
				   ),
				   array(
					  'id' => 344,
					  'name' => 'MV Agusta'
				   ),
				   array(
					  'id' => 345,
					  'name' => 'National Crane'
				   ),
				   array(
					  'id' => 346,
					  'name' => 'Nautic'
				   ),
				   array(
					  'id' => 347,
					  'name' => 'Nauticat'
				   ),
				   array(
					  'id' => 348,
					  'name' => 'New Holland'
				   ),
				   array(
					  'id' => 349,
					  'name' => 'Nissan'
				   ),
				   array(
					  'id' => 350,
					  'name' => 'Nobel'
				   ),
				   array(
					  'id' => 351,
					  'name' => 'Nordkapp'
				   ),
				   array(
					  'id' => 352,
					  'name' => 'NSU'
				   ),
				   array(
					  'id' => 353,
					  'name' => 'Nux'
				   ),
				   array(
					  'id' => 354,
					  'name' => 'Oayun'
				   ),
				   array(
					  'id' => 355,
					  'name' => 'Oldsmobile'
				   ),
				   array(
					  'id' => 356,
					  'name' => 'Olympian'
				   ),
				   array(
					  'id' => 357,
					  'name' => 'Omega'
				   ),
				   array(
					  'id' => 358,
					  'name' => 'Opel'
				   ),
				   array(
					  'id' => 359,
					  'name' => 'Orion'
				   ),
				   array(
					  'id' => 360,
					  'name' => 'Ovlac'
				   ),
				   array(
					  'id' => 361,
					  'name' => 'Packard'
				   ),
				   array(
					  'id' => 362,
					  'name' => 'Palfinger'
				   ),
				   array(
					  'id' => 363,
					  'name' => 'Peerless'
				   ),
				   array(
					  'id' => 364,
					  'name' => 'Pegaso'
				   ),
				   array(
					  'id' => 365,
					  'name' => 'Peterbilt'
				   ),
				   array(
					  'id' => 366,
					  'name' => 'Peugeot'
				   ),
				   array(
					  'id' => 367,
					  'name' => 'PGO'
				   ),
				   array(
					  'id' => 368,
					  'name' => 'Piaggio'
				   ),
				   array(
					  'id' => 369,
					  'name' => 'Pionner'
				   ),
				   array(
					  'id' => 370,
					  'name' => 'Pit Bike'
				   ),
				   array(
					  'id' => 371,
					  'name' => 'Plymouth'
				   ),
				   array(
					  'id' => 372,
					  'name' => 'Polaris'
				   ),
				   array(
					  'id' => 373,
					  'name' => 'Pontiac'
				   ),
				   array(
					  'id' => 374,
					  'name' => 'Porsche'
				   ),
				   array(
					  'id' => 375,
					  'name' => 'Poseidon'
				   ),
				   array(
					  'id' => 376,
					  'name' => 'Powerscreen'
				   ),
				   array(
					  'id' => 377,
					  'name' => 'Predictor'
				   ),
				   array(
					  'id' => 378,
					  'name' => 'Prelude'
				   ),
				   array(
					  'id' => 379,
					  'name' => 'Proton'
				   ),
				   array(
					  'id' => 380,
					  'name' => 'Prott'
				   ),
				   array(
					  'id' => 381,
					  'name' => 'Pumar'
				   ),
				   array(
					  'id' => 382,
					  'name' => 'PYH'
				   ),
				   array(
					  'id' => 383,
					  'name' => 'PZ'
				   ),
				   array(
					  'id' => 384,
					  'name' => 'Quingri'
				   ),
				   array(
					  'id' => 385,
					  'name' => 'Rabalme'
				   ),
				   array(
					  'id' => 386,
					  'name' => 'Randon'
				   ),
				   array(
					  'id' => 387,
					  'name' => 'Range Rover'
				   ),
				   array(
					  'id' => 388,
					  'name' => 'Ranger'
				   ),
				   array(
					  'id' => 389,
					  'name' => 'Rauch'
				   ),
				   array(
					  'id' => 390,
					  'name' => 'Rautop'
				   ),
				   array(
					  'id' => 391,
					  'name' => 'Regal'
				   ),
				   array(
					  'id' => 392,
					  'name' => 'Regal Raptor'
				   ),
				   array(
					  'id' => 393,
					  'name' => 'Regnicoli'
				   ),
				   array(
					  'id' => 394,
					  'name' => 'Renault'
				   ),
				   array(
					  'id' => 395,
					  'name' => 'Rermann'
				   ),
				   array(
					  'id' => 396,
					  'name' => 'Rexton'
				   ),
				   array(
					  'id' => 397,
					  'name' => 'Rhino'
				   ),
				   array(
					  'id' => 398,
					  'name' => 'Rino'
				   ),
				   array(
					  'id' => 399,
					  'name' => 'Riotecnia'
				   ),
				   array(
					  'id' => 400,
					  'name' => 'Rizato'
				   ),
				   array(
					  'id' => 401,
					  'name' => 'Robot'
				   ),
				   array(
					  'id' => 402,
					  'name' => 'Rolls-Royce'
				   ),
				   array(
					  'id' => 403,
					  'name' => 'Rondini'
				   ),
				   array(
					  'id' => 404,
					  'name' => 'Rotax'
				   ),
				   array(
					  'id' => 405,
					  'name' => 'Rover'
				   ),
				   array(
					  'id' => 406,
					  'name' => 'Royal Enfield'
				   ),
				   array(
					  'id' => 407,
					  'name' => 'Saab'
				   ),
				   array(
					  'id' => 408,
					  'name' => 'Sabatch'
				   ),
				   array(
					  'id' => 409,
					  'name' => 'Sachs'
				   ),
				   array(
					  'id' => 410,
					  'name' => 'Saleen'
				   ),
				   array(
					  'id' => 411,
					  'name' => 'Same'
				   ),
				   array(
					  'id' => 412,
					  'name' => 'Samsung'
				   ),
				   array(
					  'id' => 413,
					  'name' => 'Sanya'
				   ),
				   array(
					  'id' => 414,
					  'name' => 'Sargent Agricola'
				   ),
				   array(
					  'id' => 415,
					  'name' => 'Saturn'
				   ),
				   array(
					  'id' => 416,
					  'name' => 'Scania'
				   ),
				   array(
					  'id' => 417,
					  'name' => 'Schwarze'
				   ),
				   array(
					  'id' => 418,
					  'name' => 'Sea-Doo'
				   ),
				   array(
					  'id' => 419,
					  'name' => 'Sea-Ray'
				   ),
				   array(
					  'id' => 420,
					  'name' => 'Seat'
				   ),
				   array(
					  'id' => 421,
					  'name' => 'Semirigido'
				   ),
				   array(
					  'id' => 422,
					  'name' => 'Shacman'
				   ),
				   array(
					  'id' => 423,
					  'name' => 'Shangai'
				   ),
				   array(
					  'id' => 424,
					  'name' => 'Shenyang'
				   ),
				   array(
					  'id' => 425,
					  'name' => 'Sherco'
				   ),
				   array(
					  'id' => 426,
					  'name' => 'Shifeng'
				   ),
				   array(
					  'id' => 427,
					  'name' => 'Shineray'
				   ),
				   array(
					  'id' => 428,
					  'name' => 'Silver Marine'
				   ),
				   array(
					  'id' => 429,
					  'name' => 'Silverado'
				   ),
				   array(
					  'id' => 430,
					  'name' => 'Simca'
				   ),
				   array(
					  'id' => 431,
					  'name' => 'Simson'
				   ),
				   array(
					  'id' => 432,
					  'name' => 'Sinotruck'
				   ),
				   array(
					  'id' => 433,
					  'name' => 'Sinski'
				   ),
				   array(
					  'id' => 434,
					  'name' => 'Ski-Doo'
				   ),
				   array(
					  'id' => 435,
					  'name' => 'Skoda'
				   ),
				   array(
					  'id' => 436,
					  'name' => 'Skua'
				   ),
				   array(
					  'id' => 437,
					  'name' => 'Skygo'
				   ),
				   array(
					  'id' => 438,
					  'name' => 'SMA'
				   ),
				   array(
					  'id' => 439,
					  'name' => 'Smart'
				   ),
				   array(
					  'id' => 440,
					  'name' => 'Socage'
				   ),
				   array(
					  'id' => 441,
					  'name' => 'Sonyen'
				   ),
				   array(
					  'id' => 442,
					  'name' => 'South Marine'
				   ),
				   array(
					  'id' => 443,
					  'name' => 'Soyoda'
				   ),
				   array(
					  'id' => 444,
					  'name' => 'Spitz'
				   ),
				   array(
					  'id' => 445,
					  'name' => 'Sport Voad'
				   ),
				   array(
					  'id' => 446,
					  'name' => 'Sportbas'
				   ),
				   array(
					  'id' => 447,
					  'name' => 'Sportboat'
				   ),
				   array(
					  'id' => 448,
					  'name' => 'Ssangyong'
				   ),
				   array(
					  'id' => 449,
					  'name' => 'Stallion'
				   ),
				   array(
					  'id' => 450,
					  'name' => 'Standard'
				   ),
				   array(
					  'id' => 451,
					  'name' => 'Stara'
				   ),
				   array(
					  'id' => 452,
					  'name' => 'Status'
				   ),
				   array(
					  'id' => 453,
					  'name' => 'Stingray'
				   ),
				   array(
					  'id' => 454,
					  'name' => 'Stoll'
				   ),
				   array(
					  'id' => 455,
					  'name' => 'Subaru'
				   ),
				   array(
					  'id' => 456,
					  'name' => 'Sukida'
				   ),
				   array(
					  'id' => 457,
					  'name' => 'Sumo'
				   ),
				   array(
					  'id' => 458,
					  'name' => 'Sunlong'
				   ),
				   array(
					  'id' => 459,
					  'name' => 'Super Hawai'
				   ),
				   array(
					  'id' => 460,
					  'name' => 'Super Products'
				   ),
				   array(
					  'id' => 461,
					  'name' => 'Surco'
				   ),
				   array(
					  'id' => 462,
					  'name' => 'Suzuki'
				   ),
				   array(
					  'id' => 463,
					  'name' => 'SYM'
				   ),
				   array(
					  'id' => 464,
					  'name' => 'Taarup'
				   ),
				   array(
					  'id' => 465,
					  'name' => 'Tahoe'
				   ),
				   array(
					  'id' => 466,
					  'name' => 'Takasaki'
				   ),
				   array(
					  'id' => 467,
					  'name' => 'Tata'
				   ),
				   array(
					  'id' => 468,
					  'name' => 'Tatu'
				   ),
				   array(
					  'id' => 469,
					  'name' => 'TCM'
				   ),
				   array(
					  'id' => 470,
					  'name' => 'Tecnomad'
				   ),
				   array(
					  'id' => 471,
					  'name' => 'Terex'
				   ),
				   array(
					  'id' => 472,
					  'name' => 'TGB'
				   ),
				   array(
					  'id' => 473,
					  'name' => 'Tiger'
				   ),
				   array(
					  'id' => 474,
					  'name' => 'TM'
				   ),
				   array(
					  'id' => 475,
					  'name' => 'Tohatsu'
				   ),
				   array(
					  'id' => 476,
					  'name' => 'Torito'
				   ),
				   array(
					  'id' => 477,
					  'name' => 'Toyota'
				   ),
				   array(
					  'id' => 478,
					  'name' => 'Trailer'
				   ),
				   array(
					  'id' => 479,
					  'name' => 'Transpak'
				   ),
				   array(
					  'id' => 480,
					  'name' => 'Travin'
				   ),
				   array(
					  'id' => 481,
					  'name' => 'Trayers'
				   ),
				   array(
					  'id' => 482,
					  'name' => 'Tremac'
				   ),
				   array(
					  'id' => 483,
					  'name' => 'Triumph'
				   ),
				   array(
					  'id' => 484,
					  'name' => 'Trophy'
				   ),
				   array(
					  'id' => 485,
					  'name' => 'Tsunami'
				   ),
				   array(
					  'id' => 486,
					  'name' => 'TVS'
				   ),
				   array(
					  'id' => 487,
					  'name' => 'United Motors'
				   ),
				   array(
					  'id' => 488,
					  'name' => 'Universal'
				   ),
				   array(
					  'id' => 489,
					  'name' => 'Ural'
				   ),
				   array(
					  'id' => 490,
					  'name' => 'Utility'
				   ),
				   array(
					  'id' => 491,
					  'name' => 'Valmet'
				   ),
				   array(
					  'id' => 492,
					  'name' => 'Valpadana'
				   ),
				   array(
					  'id' => 493,
					  'name' => 'Valtra'
				   ),
				   array(
					  'id' => 494,
					  'name' => 'Van Hool'
				   ),
				   array(
					  'id' => 495,
					  'name' => 'Vento'
				   ),
				   array(
					  'id' => 496,
					  'name' => 'Vermeer v'
				   ),
				   array(
					  'id' => 497,
					  'name' => 'Verona'
				   ),
				   array(
					  'id' => 498,
					  'name' => 'Vespa Vicon'
				   ),
				   array(
					  'id' => 499,
					  'name' => 'Victoria'
				   ),
				   array(
					  'id' => 500,
					  'name' => 'Victory'
				   ),
				   array(
					  'id' => 501,
					  'name' => 'Volare'
				   ),
				   array(
					  'id' => 502,
					  'name' => 'Volkswagen'
				   ),
				   array(
					  'id' => 503,
					  'name' => 'Volvo'
				   ),
				   array(
					  'id' => 504,
					  'name' => 'Vulcan'
				   ),
				   array(
					  'id' => 505,
					  'name' => 'Wagner'
				   ),
				   array(
					  'id' => 506,
					  'name' => 'Walker Bay'
				   ),
				   array(
					  'id' => 507,
					  'name' => 'Wanch'
				   ),
				   array(
					  'id' => 508,
					  'name' => 'Wangye'
				   ),
				   array(
					  'id' => 509,
					  'name' => 'Water Scooter'
				   ),
				   array(
					  'id' => 510,
					  'name' => 'Western Star'
				   ),
				   array(
					  'id' => 511,
					  'name' => 'Willys'
				   ),
				   array(
					  'id' => 512,
					  'name' => 'Wolken'
				   ),
				   array(
					  'id' => 513,
					  'name' => 'Wuhlmaus'
				   ),
				   array(
					  'id' => 514,
					  'name' => 'Wuling'
				   ),
				   array(
					  'id' => 515,
					  'name' => 'XCMG'
				   ),
				   array(
					  'id' => 516,
					  'name' => 'Xgjao'
				   ),
				   array(
					  'id' => 517,
					  'name' => 'Xinfu'
				   ),
				   array(
					  'id' => 518,
					  'name' => 'Xingyue'
				   ),
				   array(
					  'id' => 519,
					  'name' => 'Xmotor'
				   ),
				   array(
					  'id' => 520,
					  'name' => 'Yale'
				   ),
				   array(
					  'id' => 521,
					  'name' => 'Yamaha'
				   ),
				   array(
					  'id' => 522,
					  'name' => 'Yanmar'
				   ),
				   array(
					  'id' => 523,
					  'name' => 'Yarara'
				   ),
				   array(
					  'id' => 524,
					  'name' => 'Yaxing'
				   ),
				   array(
					  'id' => 525,
					  'name' => 'Yepear'
				   ),
				   array(
					  'id' => 526,
					  'name' => 'Yingang'
				   ),
				   array(
					  'id' => 527,
					  'name' => 'Yinxiang'
				   ),
				   array(
					  'id' => 528,
					  'name' => 'Yomel'
				   ),
				   array(
					  'id' => 529,
					  'name' => 'Youyi'
				   ),
				   array(
					  'id' => 530,
					  'name' => 'Yuejin'
				   ),
				   array(
					  'id' => 531,
					  'name' => 'Yugo'
				   ),
				   array(
					  'id' => 532,
					  'name' => 'Zastava'
				   ),
				   array(
					  'id' => 533,
					  'name' => 'Zetor'
				   ),
				   array(
					  'id' => 534,
					  'name' => 'Zhongtong'
				   ),
				   array(
					  'id' => 535,
					  'name' => 'ZNA'
				   ),
				   array(
					  'id' => 536,
					  'name' => 'Znen Group'
				   ),
				   array(
					  'id' => 537,
					  'name' => 'Zodiac'
				   ),
				   array(
					  'id' => 538,
					  'name' => 'Zongshen'
				   ),
				   array(
					  'id' => 539,
					  'name' => 'Zotye'
				   ),
				   array(
					  'id' => 540,
					  'name' => 'Zueger'
				   ),
				   array(
					  'id' => 541,
					  'name' => 'Zumotho'
				   ),
				   array(
					  'id' => 542,
					  'name' => 'Zundapp'
				   ),
				   array(
					  'id' => 543,
					  'name' => 'ZX'
				   ),
				   array(
					  'id' => 544,
					  'name' => 'Other'
				   ),
				   array(
					  'id' => 545,
					  'name' => 'Other Makes'
				   ),
				   array(
					  'id' => 546,
					  'name' => 'Buick'
				   )
				);
}

class anotherSoapClient extends SoapClient {

		function __construct($wsdl, $options) {
				parent::__construct($wsdl, $options);
				$this->server = new SoapServer($wsdl, $options);
		}
		public function __doRequest($request, $location, $action, $version) { 
				$result = parent::__doRequest($request, $location, $action, $version); 
				return $result; 
		} 
		function __anotherRequest($call, $params) {
				$location = 'http://192.168.2.17:85/FacadeWebService.asmx';
				$action = 'http://tempuri.org/' . $call;
				$request = $params;
				$result =$this->__doRequest($request, $location, $action, '1');
				return $result;
		} 
}
