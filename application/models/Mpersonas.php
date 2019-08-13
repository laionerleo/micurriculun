<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpersonas extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function get_all(){
 		$query = $this->db->get('cur_personas');
 		$result = $query->result();
 		return $result;
 	}
 	
 	public function getpersonas($id){
    $visitas=rand(1,3);
    $sql="update cur_personas set per_visitas = per_visitas +'$visitas' where per_id = '$id'";
    $this->db->query($sql);

 		$this->db->where('per_id',$id);
 		$query = $this->db->get('cur_personas');
 		$result = $query->result();
 		return @$result[0];
 	}

    public function getid($usuario){

    $this->db->where('per_usuario',$usuario);
    $query = $this->db->get('cur_personas');
    $result = $query->result();
    return @$result[0];
  }
  	
 	/**/
  public function create($dator){
    
    $datos = array( 'per_name' =>$dator['name'],
                'per_apellidopaterno' =>$dator['apellidopaterno'],
                'per_apellidomaterno' =>$dator['apellidomaterno'],
                'per_ci' =>$dator['ci'],
                'per_birthdate' =>$dator['birthdate'],
                'per_age' =>$dator['age'],
                'per_linkyoutube' =>$dator['linkyoutube'],
                'per_template' =>$dator['template'],
                'per_usuario' =>$dator['usuario'],
                'per_state' =>$dator['state']
                        );

    $this->db->insert("cur_personas",$datos);
    $personas=$this->db->insert_id();
    return $personas;
    }
  /**/

  public function update($dator){
    
    $datos = array( 'per_name' =>$dator['name'],
                'per_apellidopaterno' =>$dator['apellidopaterno'],
                'per_apellidomaterno' =>$dator['apellidomaterno'],
                'per_ci' =>$dator['ci'],
                'per_birthdate' =>$dator['birthdate'],
                'per_age' =>$dator['age'],
                'per_linkyoutube' =>$dator['linkyoutube'],
                'per_template' =>$dator['template'],
                'per_usuario' =>$dator['usuario'],
                'per_state' =>$dator['state']
                        );
    $this->db->where('per_id',$dator['h_per_id']);
    $this->db->update("cur_personas",$datos);

    return $dator['h_per_id'];
    }

 	 function get_curriculum($id){
    	$d= array();
          $this->db->select('*');
          $this->db->from('cur_personas');
          $this->db->where('cur_personas.per_id ='.$id);
          $d['persona'] = $this->db->get()->result(); 
   		 
   		  $this->db->select('*');
          $this->db->from('cur_contactos');
          $this->db->where('cur_contactos.con_idpersona ='.$id);
          $d['persona'] = $d + $this->db->get()->result(); 

          $this->db->select('*');
          $this->db->from('cur_idiomas');
          $this->db->where('cur_idiomas.idm_idpersona ='.$id);
          $d['persona'] = $d + $this->db->get()->result(); 

          $this->db->select('*');
          $this->db->from('cur_referencias');
          $this->db->where('cur_referencias.ref_idpersona ='.$id);
          $d['persona'] = $d + $this->db->get()->result(); 

          $this->db->select('*');
          $this->db->from('cur_universidades');
          $this->db->where('cur_universidades.uni_idpersona ='.$id);
          $d['persona'] = $d + $this->db->get()->result(); 

          $this->db->select('*');
          $this->db->from('cur_diplomados');
          $this->db->where('cur_diplomados.dip_idpersona ='.$id);
          $d['persona'] = $d + $this->db->get()->result(); 

          $this->db->select('*');
          $this->db->from('cur_maestrias');
          $this->db->where('cur_maestrias.mae_idpersona ='.$id);
          $d['persona'] = $d + $this->db->get()->result(); 
   		       
   		 return $d;                      
   }


 	/**/

   public function eliminar($dator){
    
    $datos = array( 
                'per_state' =>'0',
                        );
    $this->db->where('per_id',$dator['h_per_id']);
    $this->db->update("cur_personas",$datos);

    return $dator['h_per_id'];
    }


    /**/

}