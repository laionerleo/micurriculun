<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
        
        parent::__construct();
 
        //cargamos la base de datos por defecto
        $this->load->database('default');
        
        //cargamos los agentes para los dispositivos
        $this->load->library('user_agent');

		//cargamos el helper url y el helper form
        $this->load->helper(array('url', 'language'));
        
        //cargamamos la libreria del lenguaje
        $this->lang->load('welcome');

        //cargamos los modelos
        $this->load->model(array('Msecurity'));

    }

	/**/
		/**/
	public function index()
	{	
		$d = array();
		$this->Msecurity->url_and_lan($d);

		$this->load->view('index', $d);
	
	}
	/**/

	public function mandarmensaje(){
		$d = array();
		$this->Msecurity->url_and_lan($d);
	
		$datos= $this->input->post();
		parse_str($this->input->post(""), $nuevodato);
		$nombre=$this->input->post("name");
		$correo=$this->input->post("correo");
		$mensajenuevo=$this->input->post("mensaje");

		print_r($nuevodato);
		$subject = "Asunto del email";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$mensaje = '<html>'.
		            '<head><title>NUEVA CONSULTA</title></head>'.
		            '<body>'.
		            'alguien esta pidiendo tus datos pa algun trabajo'.
		            $nombre.
		            '<br>'.
		            ' el mensaje es '.
		            $mensajenuevo.
		            '<br>'.
		            
		            '</body>'.
		            '</html>';
		            echo "$mensaje";
		            $enviado = mail($correo, "nueva consulta", $mensaje, $headers);





	}	



	public function error404($lan='es')
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$this->load->view('error404', $d);
	
	}

	/**/

	public function error($lan='es')
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$this->load->view('error403', $d);
	
	}

	/**/

	public function error403($lan='es')
	{
		$d = array();
		$this->Msecurity->url_and_lan($d);
		$this->load->view('error403', $d);
	
	}

	/**/
}