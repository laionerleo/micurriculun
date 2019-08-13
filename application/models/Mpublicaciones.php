<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpublicaciones extends CI_MODEL {
	/**/
	public function __construct()
    {
        parent::__construct();

 	}

 	/*funcion que debuelve toda las razas de la tablas razas*/
 	public function get_all(){
 		$query = $this->db->get('cur_publicaciones');
 		$result = $query->result();
 		return $result;
 	}

 	/**/
 	public function getpublicaciones($id){

 		$this->db->where('per_id',$id);
 		$query = $this->db->get('cur_publicaciones');
 		$result = $query->result();
 		return @$result;
 	}
 	/**/
 	/**/

}