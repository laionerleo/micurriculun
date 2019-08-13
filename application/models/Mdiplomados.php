<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdiplomados extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function get_all(){
 		$query = $this->db->get('cur_diplomados');
 		$result = $query->result();
 		return $result;
 	}
 	
 	/**/
 	public function getdiplomados($id){

 		$this->db->where('per_id',$id);
 		$query = $this->db->get('cur_diplomados');
 		$result = $query->result();
 		return $result;
 	}
 	/**/
 	public function create($dator){
    
    $datos = array( 'dip_topic' =>$dator['topic'],
                'dip_startdate' =>$dator['startdate'],
                'dip_detail' =>$dator['detail'],
                'dip_nrodoc' =>$dator['nrodoc'],
                'dip_idpersona' =>$dator['idpersona'],
                'dip_state' =>$dator['state']
                        );

    $this->db->insert("cur_diplomados",$datos);
    $diplomados=$this->db->insert_id();
    return $diplomados;
    }
 	/**/
    public function update($dator){
    
    $datos = array( 'dip_topic' =>$dator['topic'],
                'dip_startdate' =>$dator['startdate'],
                'dip_detail' =>$dator['detail'],
                'dip_nrodoc' =>$dator['nrodoc'],
                'dip_idpersona' =>$dator['idpersona'],
                'dip_state' =>$dator['state']
                        );
    $this->db->where('dip_id',$dator['h_dip_id']);
    $this->db->update("cur_diplomados",$datos);

    return $dator['h_dip_id'];
    }

}