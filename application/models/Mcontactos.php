<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcontactos extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function get_all(){
 		$query = $this->db->get('cur_contactos');
 		$result = $query->result();
 		return $result;
 	}

 	/**/
 	public function getcontactos($id){

 		$this->db->where('con_id',$id);
 		$query = $this->db->get('cur_contactos');
 		$result = $query->result();
 		return @$result[0];
 	}
    /**/
    public function getcontactos1($id){

        $this->db->where('per_id',$id);
        $query = $this->db->get('cur_contactos');
        $result = $query->result();
        return $result;
    }
 	/**/
 	public function create($dator){
    
    $datos = array( 'con_number' =>$dator['number'],
                'con_type' =>$dator['type'],
                'con_detail' =>$dator['detail'],
                'con_idpersona' =>$dator['idpersona'],
                'con_state' =>$dator['state']
                        );

    $this->db->insert("cur_contactos",$datos);
    $contactos=$this->db->insert_id();
    return $contactos;
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
    $this->db->update("cur_contactos",$datos);

    return $dator['h_con_id'];
    }

}