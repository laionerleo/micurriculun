<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcursos extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function get_all(){
 		$query = $this->db->get('cur_cursos');
 		$result = $query->result();
 		return $result;
 	}
 	/**/
 	public function getcursos($id){

 		$this->db->where('per_id',$id);
 		$query = $this->db->get('cur_cursos');
 		$result = $query->result();
 		return $result;
 	}
 	/**/
 	public function create($dator){
    
    $datos = array( 'cur_curso' =>$dator['curso'],
                'cur_fechafin' =>$dator['fechafin'],
                'cur_nivel' =>$dator['nivel'],
                'cur_instituto' =>$dator['instituto'],
                'cur_duraciondelcurso' =>$dator['duraciondelcurso'],
                'cur_estudiodetalle' =>$dator['estudiodetalle'],
                'cur_idpersona' =>$dator['idpersona'],
                'cur_state' =>$dator['state']
                        );

    $this->db->insert("cur_cursos",$datos);
    $cursos=$this->db->insert_id();
    return $cursos;
    }
 	/**/
      public function update($dator){
    
    $datos = array( 'cur_curso' =>$dator['curso'],
                'cur_fechafin' =>$dator['fechafin'],
                'cur_nivel' =>$dator['nivel'],
                'cur_instituto' =>$dator['instituto'],
                'cur_duraciondelcurso' =>$dator['duraciondelcurso'],
                'cur_estudiodetalle' =>$dator['estudiodetalle'],
                'cur_idpersona' =>$dator['idpersona'],
                'cur_state' =>$dator['state']
                        );
    $this->db->where('cur_id',$dator['h_cur_id']);
    $this->db->update("cur_cursos",$datos);

    return $dator['h_cur_id'];
    }
 	/**/

}