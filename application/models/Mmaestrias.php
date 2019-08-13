<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmaestrias extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function get_all(){
 		$query = $this->db->get('cur_maestrias');
 		$result = $query->result();
 		return $result;
 	}

 	/**/
 	public function getmaestrias($id){

 		$this->db->where('per_id',$id);
 		$query = $this->db->get('cur_maestrias');
 		$result = $query->result();
 		return $result;
 	}
 	/**/
 	/**/

}