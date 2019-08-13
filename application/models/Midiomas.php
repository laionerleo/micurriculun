<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Midiomas extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function get_all(){
 		$query = $this->db->get('cur_idiomas');
 		$result = $query->result();
 		return $result;
 	}

 	/**/
	public function getidiomas($id){

 		$this->db->where('per_id',$id);
 		$query = $this->db->get('cur_idiomas');
 		$result = $query->result();
 		return $result;
 	}
 	/**/
 	/**/

}