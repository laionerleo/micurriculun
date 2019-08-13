<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mexperiencias extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function get_all(){
 		$query = $this->db->get('cur_experiencias');
 		$result = $query->result();
 		return $result;
 	}

 	/**/
 	public function getexperiencias($id){

 		$this->db->where('per_id',$id);
 		$query = $this->db->get('cur_experiencias');
 		$result = $query->result();
 		return $result;
 	}
 	/**/
 	/**/

}