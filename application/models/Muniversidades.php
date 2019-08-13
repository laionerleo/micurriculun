<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muniversidades extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function get_all(){
 		$query = $this->db->get('cur_universidades');
 		$result = $query->result();
 		return $result;
 	}

 	/**/
 	 public function getuniversidades($id){

 		$this->db->where('per_id',$id);
 		$query = $this->db->get('cur_universidades');
 		$result = $query->result();
 		return $result;
 	}
 	/**/
 	public function create($dator){
    
    $datos = array( 
                'uni_nombre' =>$dator['nombre'],
                'uni_carrera' =>$dator['carrera'],
                'uni_fechaTitulacion' =>$dator['idpersona'],
                'uni_fechaTitulacion' =>$dator['fechaTitulacion'],
                'uni_emailuniversidad' =>$dator['emailuniversidad'],
                'uni_telefono' =>$dator['telefono'],
                'uni_idpersona' =>$dator['idpersona'],
                'uni_state' =>$dator['state']
                        );

    $this->db->insert("cur_universidades",$datos);
    $universidades=$this->db->insert_id();
    return $universidades;
    }
 	/**/
      public function update($dator){
    
    $datos = array( 'con_number' =>$dator['number'],
                'con_type' =>$dator['type'],
                'con_detail' =>$dator['detail'],
                'con_idpersona' =>$dator['idpersona'],
                'con_state' =>$dator['state']
                        );
    $this->db->where('con_id',$dator['h_con_id']);
    $this->db->update("cur_universidades",$datos);

    return $dator['h_con_id'];
    }

}