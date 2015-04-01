<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 */
class UsuariosController extends AppController {

    public $uses = array('Usuario', 'UsuarioCodigo', 'Codigo', 'TotalCodigo', 'Regione', 'Comuna');

	public function index() {
            $fbSet = Configure::read('FB');
            if(!$this->Session->check('access_token')){
                $this->Session->write('state', md5(uniqid(rand(), TRUE)));
                $urlAuthFb = 'https://www.facebook.com/dialog/oauth?client_id='.$fbSet['APP_ID'].'&redirect_uri='.urlencode(Router::url(array('controller' => 'usuarios', 'action' => 'callback'), true)).'&scope=email,publish_stream&state='.$this->Session->read('state');
                $this->set('urlAuthFb', $urlAuthFb);
            }else{
                $this->redirect("/");
                exit();
            }
	}

	public function view($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
		$this->set('usuario', $this->Usuario->find('first', $options));
	}

	public function add( $args = null) {
		if ($this->request->is('post') || $args != null) {
			$this->Usuario->create();
            #Si registra desde otro metodo
            if($args) {
                $this->request->data = $args['Usuarios'];
            } else {
                $arrUserAdd = array(
                        "fbuid" =>   $this->request->data['id'],
                        "firstname" =>   $this->request->data['first_name'],
                        "lastname" =>   $this->request->data['last_name'],
                        "email" =>   $this->request->data['email'],
                        "genero" =>   $this->request->data['gender'],
                        "ip" => $this->request->clientIp(),
                        "complete" => 0,
                        "created" => date('Y-m-d H:i:s'),
                        "meta" => json_encode(array("link" =>   $this->request->data['link'], "locale" =>   $this->request->data['locale'], "name" =>   $this->request->data['name'], "timezone" =>   $this->request->data['timezone'], "updated_time" =>   $this->request->data['updated_time'], "username" =>   $this->request->data['username']))
                    );
                $this->request->data = $arrUserAdd;
            }

            $getUser = $this->Usuario->findByFbuid($this->request->data["fbuid"]);

            $response = array();
            if(!$getUser['Usuario']['fbuid']){
                $resultSave = $this->Usuario->save($this->request->data);
                if ($resultSave) {
                    $this->Session->write('uid', $this->Usuario->id);
                    $response = array("state" => 1, "complete" => 0, "email" => $resultSave['Usuario']['email'], "firstname" => $resultSave['Usuario']['firstname'], "lastname" => $resultSave['Usuario']['lastname']);
                } else {
                    $response = array("state" => 0, "complete" => 0);
                }
            }  else {
                $this->Usuario->id = $getUser['Usuario']['id'];
                $this->Usuario->save(array('ultimo_acceso' => date('Y-m-d H:i:s'), 'complete' => $getUser['Usuario']['complete']));
                $this->Session->write('uid', $getUser['Usuario']['id']);
                $response = array("state" => 2, "complete" => $getUser['Usuario']['complete'], "email" => $getUser['Usuario']['email'], "firstname" => $getUser['Usuario']['firstname'], "lastname" => $getUser['Usuario']['lastname']);
            }

            if (!$args) {
                echo json_encode($response);
                exit();
            }

            
            #$log = $this->Usuario->getDataSource()->getLog(false, false);
            #debug($log);
            #die();
		}
	}

    public function callback(){
        if($this->request->query('code')){
            $fbSet = Configure::read('FB');
            $urlCb = Router::url(array('controller' => 'usuarios', 'action' => 'callback'), true) . '?cb=1';
            $urlToken = 'https://graph.facebook.com/oauth/access_token?client_id='.$fbSet['APP_ID'].'&redirect_uri='.urlencode($urlCb).'&client_secret='.$fbSet['APP_SECRET'].'&code='.$this->request->query('code');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $urlToken);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            $output = curl_exec($ch);
            $meta = explode("&", $output);
            $access = explode("=", $meta[0]);

            curl_close($ch);


            $urlData = 'https://graph.facebook.com/me?access_token='.$access[1];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $urlData);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            $outputData = curl_exec($ch);
            $metaData = json_decode($outputData);
            $metaData->access_token = $access[1];
            curl_close($ch);

            $arrUserAdd['Usuarios'] =
                array(
                    "fbuid" => $metaData->id,
                    "firstname" => $metaData->first_name,
                    "lastname" => $metaData->last_name,
                    "email" => $metaData->email,
                    "genero" => $metaData->gender,
                    "ip" => $this->request->clientIp(),
                    "complete" => 0,
                    "created" => date('Y-m-d H:i:s'),
                    "meta" => json_encode(array("link" => $metaData->link, "locale" => $metaData->locale, "name" => $metaData->name, "timezone" => $metaData->timezone, "updated_time" => $metaData->updated_time, "username" => $metaData->username))
                );
            $this->add($arrUserAdd);
            $this->Session->write('genero', $metaData->gender);
            $this->Session->write('idFb', $metaData->id);
            $this->Session->write('access_token', $metaData->access_token);
            $this->Session->write('auth', 1);
            
            $this->redirect('/?cb=1');
            exit();
        }else{
            $this->redirect('/');
            exit();
        }
    }

    public function registro(){
        #Sino tiene session se va al login
        if ($this->Session->read('idFb') === null) {
            $this->redirect(array("action" =>"index"));
            exit();
        }
        #Setear UTF8 para los querys
        $this->Regione->query("SET NAMES 'UTF8'");
        #Obtener data usuario
        $getUser = $this->Usuario->findByFbuid($this->Session->read('idFb'));

        #Si ya se registro pasa al final
        if($getUser['Usuario']['complete'] == 1){
            $this->redirect(array("controller" => "pages", "action" => "vehiculo"));
            exit();
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
                "name" => $comun["Comuna"]["name"],
                "region_id" => $comun["Comuna"]["region_id"]
            );
        }
                
        $this->set('userData', $getUser['Usuario']);      
        $this->set('regiones', $regione);
        $this->set('regionesR', $regioneR);
        $this->set('comunasArr', $arrDataC);
        $this->set('page', 'registro');
    }

    public function save(){
        $this->layout = 'ajax';
        if ($this->request->is('post')) {
            $this->Usuario->id = $this->Session->read('uid');
            $this->request->data = $this->request->data['Usuario'];
            $this->request->data["rut"] = str_replace(array(".","-",","), "", $this->request->data["rut"]);
            $this->request->data["complete"] = 1;
            $this->Usuario->query("SET NAMES 'UTF8'");
            if ($this->Usuario->save($this->request->data)) {
                echo json_encode(array("state" => 1));
            } else {
                echo json_encode(array("state" => 0));
            }
        }
        die();
    }

    public function codigo(){
        /*****
        Respuesta de los estado para un código:
        1: Ganador
        2: Perdedor
        3: Error al guardar intento/código.
        4: Usuario ya utlizó su código
        5: Código utilizado dos veces(distintos usuarios)
        6: Código no encontrado/fake
        7: Código inválido, no cumple con el largo minimo o viene con caracteres NO alfanúmericos
        8: Http request no-Post
        *****/
        $this->layout = 'ajax';
        #Si es metodo post
        if ($this->request->is('post')) {
            $codigoStr = strtoupper( preg_replace('/[^a-zA-Z0-9]/', '', $this->request->data["Usuario"]["codigo"]) );
            #Verificamos largo del string codigo
            if(strlen($codigoStr) == 10){
                #Busca el codigo en la db
                $isCodeOk = $this->Codigo->find('first',array(
                                'fields' => array('Codigo.id'),
                                'conditions' => array('Codigo.codigo' => $codigoStr, 'Codigo.entregado' => 0)
                            ));

                #Si encuentra el codigo
                if(!empty($isCodeOk)){
                    $codigoID = $isCodeOk['Codigo']['id'];
                    #Cuenta la cantidad utilizada por el codigo
                    $isCodeUsed = $this->TotalCodigo->find('first',array(
                               'fields' => array('TotalCodigo.total'),
                               'conditions' => array('TotalCodigo.codigo_id' => $codigoID)
                           ));
                    #Revisa la cantidad de veces usado
                    if(!$isCodeUsed['TotalCodigo']['total']){
                        #Revisa si el usuario ya ingreso el codigo
                        $isCodeUsedUser = $this->UsuarioCodigo->find('count',array(
                                'conditions' => array('UsuarioCodigo.codigo_id' => $codigoID, 'UsuarioCodigo.usuario_id' => $this->Session->read('uid'))
                            ));
                        if($isCodeUsedUser == 0){
                            #Guardar registro y verificar si es premiado
                            $responseCode = $this->quemar($codigoID);
                        }else{
                            #echo "Ya utlizaste este codigo";
                            $responseCode = 4;
                        }
                    }else{
                        #echo "Codigo Utilizado.";
                        $responseCode = 5;
                    }
                }else{
                    #echo "Codigo No Econttrado.";
                    $responseCode = 6;
                }
            }else{
                #echo "Codigo Invalido.";
                $responseCode = 7;
            }
        }else{
            //$this->redirect(array("controller" => "pages"));
            $responseCode = 8;
        }
        $this->Session->write('responseCode', $responseCode);
        //$this->redirect(array("controller" => "pages", "action" => "vehiculo"));
        echo json_encode(array("state" => $responseCode));
        exit();
    }

    private function quemar( $codigoID ){
        #Guarda codigo ingresado
        $dataSave = array('usuario_id' => $this->Session->read('uid'), 'codigo_id' => $codigoID);
        if($this->UsuarioCodigo->save($dataSave)){
            #Revisa si el codigo es ganador
            $dataCode = $this->Codigo->find('first', array(
                    'fields' => array('Codigo.premiado'),
                    'conditions' => array('Codigo.id' => $codigoID)
                ));
            if($dataCode['Codigo']['premiado'] == true){
                #Actualizar el código premiado a validado por usuario
                $this->Codigo->id = $codigoID;
                $this->Codigo->save(array(
                        "Codigo" => array('validado' => 1, 'validado_fecha' => date('Y-m-d H:i:s'))
                    ));
                #echo "Felicitaciones!!!";
                $responseCode = 1;
                $getUser = $this->Usuario->findById( $this->Session->read('uid') );
                
                $email = new CakeEmail();
                $email->config('smtp')
                        ->subject("¡Ya estás listo para el mejor festival del 2015!")
                        ->to($getUser['Usuario']['email'])
                        ->template("ganaste")
                        ->emailFormat('html')
                        ->send();
            }else{
                #echo "Looser!";
                $responseCode = 2;
            }
        }else{
            #echo "Error al guardar intento/codigo.";
            $responseCode = 3;
        }
        return $responseCode;
    }
}
