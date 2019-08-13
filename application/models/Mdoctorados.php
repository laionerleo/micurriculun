<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdoctorados extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function get_all(){
 		$query = $this->db->get('cur_doctorados');
 		$result = $query->result();
 		return $result;
 	}

 	/**/
 	public function getdoctorados($id){

 		$this->db->where('per_id',$id);
 		$query = $this->db->get('cur_doctorados');
 		$result = $query->result();
 		return $result;
 	}
 	/**/
 	public function create($dator){
    
    $datos = array( 'doc_safe' =>$dator['safe'],
                'doc_startdate' =>$dator['startdate'],
                'doc_detail' =>$dator['detail'],
                'doc_nrodoc' =>$dator['nrodoc'],
                'doc_idpersona' =>$dator['idpersona'],
                'doc_state' =>$dator['state']
                        );

    $this->db->insert("cur_doctorados",$datos);
    $doctorados=$this->db->insert_id();
    return $doctorados;
    }
 	/**/
    public function update($dator){
    
    $datos = array( 'doc_safe' =>$dator['safe'],
                'doc_startdate' =>$dator['startdate'],
                'doc_detail' =>$dator['detail'],
                'doc_nrodoc' =>$dator['nrodoc'],
                'doc_idpersona' =>$dator['idpersona'],
                'doc_state' =>$dator['state']
                        );
    $this->db->where('doc_id',$dator['h_doc_id']);
    $this->db->update("cur_doctorados",$datos);

    return $dator['h_doc_id'];
    }


}